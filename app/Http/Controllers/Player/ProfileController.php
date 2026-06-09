<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlayerProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlayerRegistrationMail;

class ProfileController extends Controller
{
    public function saveProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'age_category' => 'required|in:Under 16,Open Age',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'alternate_phone_number' => 'nullable|string|max:15',
            'aadhar_number' => 'nullable|digits:12',
            'state' => 'required|string',
            'district' => 'required|string',
            'player_role' => 'required|in:Batsman,Bowler,Wicket Keeper,All Rounder',
            'trial_state' => 'required|string',
            'trial_district' => 'required|string',
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->gender === 'Female') {
                if ($request->age_category !== 'Open Age') {
                    $validator->errors()->add('age_category', 'Female players can only register for the Open Age category.');
                }
                
                if ($request->dob) {
                    $dob = strtotime($request->dob);
                    $limitDate = strtotime('2011-01-01');
                    if ($dob >= $limitDate) {
                        $validator->errors()->add('dob', 'Females must be born before 1 Jan 2011 to apply.');
                    }
                }
            }
        });

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        try {
            $user = Auth::user();

            // Get Dynamic Price
            $currentPrice = \App\Models\WebSetting::getCurrentRegistrationPrice();

            // Create Razorpay Order
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            
            $order = $api->order->create([
                'receipt' => 'receipt_' . $user->id . '_' . time(),
                'amount' => $currentPrice * 100, // Price in paise
                'currency' => 'INR',
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'amount' => $currentPrice * 100,
                'key' => config('services.razorpay.key'),
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $user->email,
                'contact' => $user->phone
            ]);

        } catch (\Exception $e) {
            Log::error('Razorpay Order Creation Failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to initiate payment. ' . $e->getMessage()], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
            'razorpay_signature' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid payment details'], 400);
        }

        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Payment successful, now create the profile safely with DB Transaction
            $profile = DB::transaction(function () use ($request, $api) {
                $user = Auth::user();
                
                $role = $request->player_role;
                $batting_style = $request->batting_style;
                $bowler_type = $request->bowler_type;
                $bowling_style = $request->bowling_style;

                if ($role === 'Batsman' || $role === 'Wicket Keeper') {
                    $bowler_type = null;
                    $bowling_style = null;
                } elseif ($role === 'Bowler') {
                    $batting_style = null;
                }

                // Save profile data
                $profile = PlayerProfile::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'father_name' => $request->father_name,
                        'mother_name' => $request->mother_name,
                        'gender' => $request->gender,
                        'dob' => $request->dob,
                        'age_category' => $request->age_category,
                        'address' => $request->address,
                        'phone_number' => $request->phone_number,
                        'alternate_phone_number' => $request->alternate_phone_number,
                        'aadhar_number' => $request->aadhar_number,
                        'state' => $request->state,
                        'district' => $request->district,
                        'player_role' => $role,
                        'batting_style' => $batting_style,
                        'bowler_type' => $bowler_type,
                        'bowling_style' => $bowling_style,
                        'trial_state' => $request->trial_state,
                        'trial_district' => $request->trial_district,
                        'razorpay_order_id' => $request->razorpay_order_id,
                    ]
                );
                
                if ($profile) {
                    // Generate Player ID if it doesn't have one
                    if (!$profile->player_id) {
                        // Lock the last profile row to prevent race conditions when reading the ID
                        $lastProfile = PlayerProfile::whereNotNull('player_id')->orderBy('id', 'desc')->lockForUpdate()->first();
                        
                        $nextIdNum = 1;
                        if ($lastProfile && preg_match('/1-HCPL-(\d+)/', $lastProfile->player_id, $matches)) {
                            $nextIdNum = (int)$matches[1] + 1;
                        }
                        
                        $profile->player_id = '1-HCPL-' . str_pad($nextIdNum, 3, '0', STR_PAD_LEFT);
                    }

                    $profile->payment_status = 'completed';
                    $profile->razorpay_payment_id = $request->razorpay_payment_id;
                    
                    try {
                        // Fetch the full payment details from Razorpay
                        $paymentResponse = $api->payment->fetch($request->razorpay_payment_id);
                        $profile->payment_amount = $paymentResponse->amount / 100;
                        $profile->payment_date = now();
                        $profile->payment_response = $paymentResponse->toArray();
                    } catch (\Exception $e) {
                        Log::error('Razorpay Payment Fetch Failed: ' . $e->getMessage());
                    }

                    $profile->save();
                }
                
                return $profile;
            });

            if ($profile) {
                // Send Fast2SMS Success Message
                if ($profile->phone_number) {
                    try {
                        $name = trim($profile->first_name . ' ' . $profile->last_name);
                        $client = new Client();
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
                                'message' => '217194',
                                'variables_values' => "{$name}|{$profile->player_id}|{$profile->age_category}",
                                'numbers' => $profile->phone_number,
                                'flash' => 0,
                            ]
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Fast2SMS failed after payment: ' . $e->getMessage());
                    }
                }

                // Send Email Notification
                $userEmail = $profile->user->email ?? null;
                if ($userEmail) {
                    try {
                        Mail::to($userEmail)->send(new PlayerRegistrationMail($profile));
                    } catch (\Exception $e) {
                        Log::error('Email failed after payment: ' . $e->getMessage());
                    }
                }

                return response()->json(['success' => true, 'message' => 'Payment verified successfully']);
            }

            return response()->json(['success' => false, 'message' => 'Profile not found'], 404);

        } catch (\Exception $e) {
            Log::error('Razorpay Signature Verification Failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Payment verification failed'], 400);
        }
    }
}
