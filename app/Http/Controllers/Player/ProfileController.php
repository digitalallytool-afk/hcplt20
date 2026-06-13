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

            // Save/Update the PlayerProfile details as a pending draft in the database
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

            PlayerProfile::updateOrCreate(
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
                    'razorpay_order_id' => $order->id,
                    'payment_status' => 'pending',
                ]
            );

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

            // Payment successful, now retrieve draft profile and complete payment
            $user = Auth::user();
            $profile = PlayerProfile::where('user_id', $user->id)
                                    ->where('razorpay_order_id', $request->razorpay_order_id)
                                    ->first();

            if (!$profile) {
                // If profile draft wasn't found under that order ID, lookup by user_id
                $profile = PlayerProfile::where('user_id', $user->id)->first();
            }

            if (!$profile) {
                return response()->json(['success' => false, 'message' => 'Profile draft not found'], 404);
            }

            // Fetch payment details to get exact amount
            $paymentAmount = \App\Models\WebSetting::getCurrentRegistrationPrice();
            $paymentResponseArray = null;
            try {
                $paymentResponse = $api->payment->fetch($request->razorpay_payment_id);
                $paymentAmount = $paymentResponse->amount / 100;
                $paymentResponseArray = $paymentResponse->toArray();
            } catch (\Exception $e) {
                Log::error('Razorpay Payment Fetch Failed: ' . $e->getMessage());
            }

            // Call completePayment method on model
            $profile->completePayment($request->razorpay_payment_id, $paymentAmount, $paymentResponseArray);

            return response()->json(['success' => true, 'message' => 'Payment verified successfully']);

        } catch (\Exception $e) {
            Log::error('Razorpay Signature Verification Failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Payment verification failed: ' . $e->getMessage()], 400);
        }
    }
}
