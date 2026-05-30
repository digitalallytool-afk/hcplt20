<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class ForgotPasswordOtpController extends Controller
{
    private $fast2SmsApiKey = 'u1YtfjPlkHRa2EzeVOw4ymUWF7IQbLpvDXNc0nhKg8Zir3SqosB7yVCPx6flwh2Fojg5RNG8JEUrktT1';

    public function showLinkRequestForm()
    {
        return view('frontend.pages.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required|string',
            'type' => 'required|in:email,mobile'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        $contact = $request->contact;
        $type = $request->type;

        // Check if user exists
        $user = User::where($type === 'email' ? 'email' : 'phone', $contact)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No account found with this contact.'], 400);
        }

        if ($type === 'mobile') {
            return $this->sendFast2SmsOtp($contact);
        } else {
            // For email
            $otp = rand(100000, 999999);
            session()->put('email_otp_' . $contact, $otp);
            session()->put('email_otp_time_' . $contact, now());
            try {
                \App\Jobs\SendEmailOtpJob::dispatch($contact, $otp, 'Password Reset');
            } catch (\Exception $e) {
                Log::error("Failed to dispatch email OTP job: " . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'Failed to process OTP request.'], 500);
            }

            return response()->json(['success' => true, 'message' => 'OTP sent successfully to email']);
        }
    }

    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required|string',
            'type' => 'required|in:email,mobile'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        return $this->sendOtp($request);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required|string',
            'type' => 'required|in:email,mobile',
            'otp' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        $contact = $request->contact;
        $type = $request->type;
        $otp = $request->otp;

        if ($type === 'mobile') {
            return $this->verifyFast2SmsOtp($contact, $otp);
        } else {
            $savedOtp = session()->get('email_otp_' . $contact);
            if ($savedOtp && $savedOtp == $otp) {
                session()->put('otp_verified_reset_' . $contact, true);
                return response()->json(['success' => true, 'message' => 'OTP verified successfully']);
            }
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP'], 400);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required|string',
            'type' => 'required|in:email,mobile',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        $contact = $request->contact;
        
        if (!session()->get('otp_verified_reset_' . $contact)) {
             return response()->json(['success' => false, 'message' => 'Please verify OTP first'], 400);
        }

        $user = User::where($request->type === 'email' ? 'email' : 'phone', $contact)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Clear session flags
        session()->forget('otp_verified_reset_' . $contact);
        session()->forget('email_otp_' . $contact);
        session()->forget('mobile_otp_reset_' . $contact);

        return response()->json([
            'success' => true, 
            'message' => 'Password reset successful',
            'redirect' => url('/')
        ]);
    }

    private function sendFast2SmsOtp($mobile)
    {
        try {
            $otp = rand(100000, 999999);
            session()->put('mobile_otp_reset_' . $mobile, $otp);
            session()->put('mobile_otp_reset_time_' . $mobile, now());

            \App\Jobs\SendMobileOtpJob::dispatch($mobile, $otp, 'Password Reset');

            return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
        } catch (\Exception $e) {
            Log::error("Failed to dispatch mobile OTP job for password reset: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to process OTP request.'], 500);
        }
    }

    private function verifyFast2SmsOtp($mobile, $otp)
    {
        $savedOtp = session()->get('mobile_otp_reset_' . $mobile);
        if ($savedOtp && $savedOtp == $otp) {
            session()->put('otp_verified_reset_' . $mobile, true);
            return response()->json(['success' => true, 'message' => 'OTP verified successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid or expired OTP'], 400);
    }
}
