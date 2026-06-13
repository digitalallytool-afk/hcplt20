<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerProfile extends Model
{


    protected $guarded = [];
    
    protected $casts = [
        'payment_response' => 'array',
        'payment_date' => 'datetime',
        'dob' => 'date',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trials()
    {
        return $this->belongsToMany(Trial::class, 'player_trials')
                    ->withPivot('trial_result', 'trial_status_date', 'trial_remark', 'id')
                    ->withTimestamps();
    }

    public function latestTrial()
    {
        return $this->belongsToMany(Trial::class, 'player_trials')
                    ->withPivot('trial_result', 'trial_status_date', 'trial_remark', 'id')
                    ->orderBy('player_trials.created_at', 'desc')
                    ->limit(1);
    }

    /**
     * Completes payment, generates sequential player ID with optimistic retry loop, and sends notifications.
     */
    public function completePayment($paymentId, $amount, $paymentResponse = null)
    {
        if ($this->payment_status === 'completed') {
            return true;
        }

        $maxRetries = 15;
        $retryCount = 0;
        $success = false;
        $alreadyCompletedByOther = false;

        while ($retryCount < $maxRetries && !$success) {
            try {
                \Illuminate\Support\Facades\DB::transaction(function () use ($paymentId, $amount, $paymentResponse, &$alreadyCompletedByOther) {
                    // Step 1: Lock THIS profile row so no other thread processes the same user simultaneously
                    $freshProfile = self::where('id', $this->id)->lockForUpdate()->first();

                    // Step 2: If another concurrent thread already completed this — exit gracefully
                    if ($freshProfile && $freshProfile->payment_status === 'completed') {
                        $alreadyCompletedByOther = true;
                        $this->refresh();
                        return;
                    }

                    // Step 3: Use $freshProfile->player_id (not stale $this->player_id) for the check
                    if (!$freshProfile->player_id) {
                        // Step 4: Lock ALL existing 1-HCPL- rows so no concurrent transaction
                        // can read a stale MAX and generate the same next number
                        $lastProfile = self::where('player_id', 'LIKE', '1-HCPL-%')
                                           ->orderByRaw('CAST(SUBSTRING(player_id, 8) AS UNSIGNED) DESC')
                                           ->lockForUpdate()
                                           ->first();

                        $nextIdNum = 1;
                        if ($lastProfile && preg_match('/1-HCPL-(\d+)/', $lastProfile->player_id, $matches)) {
                            $nextIdNum = (int)$matches[1] + 1;
                        }

                        $newPlayerId = '1-HCPL-' . str_pad($nextIdNum, 3, '0', STR_PAD_LEFT);

                        // Step 5: Write the new player_id onto the freshProfile (locked row) and save
                        $freshProfile->player_id      = $newPlayerId;
                        $freshProfile->payment_status  = 'completed';
                        $freshProfile->razorpay_payment_id = $paymentId;
                        $freshProfile->payment_amount  = $amount;
                        $freshProfile->payment_date    = now();
                        $freshProfile->payment_response = $paymentResponse;
                        $freshProfile->save();

                        // Step 6: Sync stale $this so notifications below use correct data
                        $this->player_id        = $freshProfile->player_id;
                        $this->payment_status   = 'completed';
                        $this->payment_amount   = $freshProfile->payment_amount;
                        $this->payment_date     = $freshProfile->payment_date;
                    } else {
                        // player_id was already set — just update payment fields
                        $freshProfile->payment_status  = 'completed';
                        $freshProfile->razorpay_payment_id = $paymentId;
                        $freshProfile->payment_amount  = $amount;
                        $freshProfile->payment_date    = now();
                        $freshProfile->payment_response = $paymentResponse;
                        $freshProfile->save();

                        $this->player_id        = $freshProfile->player_id;
                        $this->payment_status   = 'completed';
                    }
                });
                
                $success = true;
            } catch (\Illuminate\Database\QueryException $e) {
                // If it is a duplicate entry error (SQLSTATE 23000)
                if ($e->getCode() == '23000' || strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    $retryCount++;
                    // Tiny backoff (random 5 to 50ms) to avoid simultaneous retry locksteps
                    usleep(rand(5000, 50000));
                    $this->refresh();
                } else {
                    throw $e;
                }
            }
        }

        if (!$success) {
            throw new \Exception("Failed to generate a unique Player ID after {$maxRetries} attempts due to high concurrent traffic.");
        }

        // If another concurrent thread (e.g. webhook) completed it first, exit gracefully without sending double notifications
        if ($alreadyCompletedByOther) {
            return true;
        }

        // Send notifications
        $this->sendRegistrationNotifications();
        
        return true;
    }

    /**
     * Dispatches Fast2SMS and email notifications.
     */
    public function sendRegistrationNotifications()
    {
        // Send Fast2SMS Success Message
        if ($this->phone_number) {
            try {
                $name = trim($this->first_name . ' ' . $this->last_name);
                $client = new \GuzzleHttp\Client();
                $fast2SmsApiKey = 'u1YtfjPlkHRa2EzeVOw4ymUWF7IQbLpvDXNc0nhKg8Zir3SqosB7yVCPx6flwh2Fojg5RNG8JEUrktT1';
                
                $client->request('POST', 'https://www.fast2sms.com/dev/bulkV2', [
                    'headers' => [
                        'accept' => 'application/json',
                        'authorization' => $fast2SmsApiKey,
                        'content-type' => 'application/json',
                    ],
                    'json' => [
                        'route' => 'dlt',
                        'sender_id' => 'ARKSPT',
                        'message' => '217878',
                        'variables_values' => "{$name}|{$this->player_id}|{$this->age_category}",
                        'numbers' => $this->phone_number,
                        'flash' => 0,
                    ]
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Fast2SMS failed after payment: ' . $e->getMessage());
            }
        }

        // Send Email Notification
        $userEmail = $this->user->email ?? null;
        if ($userEmail) {
            try {
                \Illuminate\Support\Facades\Mail::to($userEmail)->send(new \App\Mail\PlayerRegistrationMail($this));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Email failed after payment: ' . $e->getMessage());
            }
        }
    }
}
