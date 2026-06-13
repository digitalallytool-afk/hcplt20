<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SendMobileOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mobile;
    public $otp;
    public $type;

    private $fast2SmsApiKey = 'u1YtfjPlkHRa2EzeVOw4ymUWF7IQbLpvDXNc0nhKg8Zir3SqosB7yVCPx6flwh2Fojg5RNG8JEUrktT1';

    /**
     * Create a new job instance.
     */
    public function __construct($mobile, $otp, $type = 'Registration')
    {
        $this->mobile = $mobile;
        $this->otp = $otp;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $client = new Client();
            if ($this->type === 'Password Reset') {
                $templateId = '217880';
            } else {
                $templateId = '217879';
            }
            
            $response = $client->request('POST', 'https://www.fast2sms.com/dev/bulkV2', [
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => $this->fast2SmsApiKey,
                    'content-type' => 'application/json',
                ],
                'json' => [
                    'route' => 'dlt',
                    'sender_id' => 'ARKSPT',
                    'message' => $templateId,
                    'variables_values' => (string)$this->otp,
                    'numbers' => $this->mobile,
                    'flash' => 0,
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            Log::info("Fast2SMS API Response for {$this->mobile}: " . json_encode($result));
            if (!isset($result['return']) || $result['return'] !== true) {
                Log::error("Fast2SMS failed to send OTP to {$this->mobile}: " . ($result['message'] ?? 'Unknown error'));
                throw new \Exception($result['message'] ?? 'Failed to send OTP via Fast2SMS');
            }
        } catch (\Exception $e) {
            Log::error("Failed to send Mobile OTP via Job to {$this->mobile}: " . $e->getMessage());
            throw $e;
        }
    }
}
