<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class PlayerRegistrationController extends Controller
{
    private $fast2SmsApiKey = 'u1YtfjPlkHRa2EzeVOw4ymUWF7IQbLpvDXNc0nhKg8Zir3SqosB7yVCPx6flwh2Fojg5RNG8JEUrktT1';

    public function showRegistrationForm()
    {
        $sliders = \App\Models\RegistrationSlider::where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.pages.registration', compact('sliders'));
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

        // Check if user already exists
        $exists = User::where($type === 'email' ? 'email' : 'phone', $contact)->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'Contact already registered. Please login.'], 400);
        }

        if ($type === 'mobile') {
            return $this->sendFast2SmsOtp($contact);
        } else {
            // For email, we will implement custom OTP logic
            $otp = rand(100000, 999999);
            session()->put('email_otp_' . $contact, $otp);
            session()->put('email_otp_time_' . $contact, now());
            try {
                \App\Jobs\SendEmailOtpJob::dispatch($contact, $otp, 'Registration');
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

        if ($request->type === 'mobile') {
            return $this->resendFast2SmsOtp($request->contact);
        } else {
            return $this->sendOtp($request); // Resend email is just generating a new one
        }
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

        Log::info("Verify OTP Request: contact={$contact}, type={$type}, otp={$otp}");

        if ($type === 'mobile') {
            return $this->verifyFast2SmsOtp($contact, $otp);
        } else {
            $savedOtp = session()->get('email_otp_' . $contact);
            $otpTime = session()->get('email_otp_time_' . $contact);
            Log::info("Verify Email OTP Details: email={$contact}, input_otp={$otp}, saved_otp={$savedOtp}, time=" . ($otpTime ? (is_string($otpTime) ? $otpTime : $otpTime->toIso8601String()) : 'null'));
            if ($savedOtp && $otpTime && now()->diffInMinutes($otpTime) <= 5 && $savedOtp == $otp) {
                session()->put('otp_verified_' . $contact, true);
                return response()->json(['success' => true, 'message' => 'OTP verified successfully']);
            }
            return response()->json(['success' => false, 'message' => 'Invalid or expired OTP'], 400);
        }
    }

    public function createPassword(Request $request)
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
        
        // Ensure OTP was verified (we check session flag or Fast2SMS already verified it)
        // Since Fast2SMS is stateless on our end, we should ideally set a session flag upon successful verification.
        if (!session()->get('otp_verified_' . $contact)) {
             return response()->json(['success' => false, 'message' => 'Please verify OTP first'], 400);
        }

        // Double check if user already exists (in case another registration completed in the meantime)
        $exists = User::where($request->type === 'email' ? 'email' : 'phone', $contact)->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'Contact already registered. Please login.'], 400);
        }

        // Create user
        $user = new User();
        if ($request->type === 'email') {
            $user->email = $contact;
            $user->name = 'Player'; // Default name, update later in dashboard
        } else {
            $user->phone = $contact;
            $user->name = 'Player'; // Default name, update later in dashboard
        }
        $user->password = Hash::make($request->password);
        $user->role = 'player';
        $user->save();

        Auth::login($user);

        // Clear session flags
        session()->forget('otp_verified_' . $contact);
        session()->forget('email_otp_' . $contact);
        session()->forget('email_otp_time_' . $contact);
        session()->forget('mobile_otp_' . $contact);
        session()->forget('mobile_otp_time_' . $contact);

        return response()->json([
            'success' => true, 
            'message' => 'Registration successful',
            'redirect' => route('player.dashboard')
        ]);
    }

    private function sendFast2SmsOtp($mobile)
    {
        try {
            $otp = rand(100000, 999999);
            session()->put('mobile_otp_' . $mobile, $otp);
            session()->put('mobile_otp_time_' . $mobile, now());

            \App\Jobs\SendMobileOtpJob::dispatch($mobile, $otp, 'Registration');

            return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
        } catch (\Exception $e) {
            Log::error("Failed to dispatch mobile OTP job: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to process OTP request.'], 500);
        }
    }

    private function resendFast2SmsOtp($mobile)
    {
        return $this->sendFast2SmsOtp($mobile);
    }

    private function verifyFast2SmsOtp($mobile, $otp)
    {
        $savedOtp = session()->get('mobile_otp_' . $mobile);
        $otpTime = session()->get('mobile_otp_time_' . $mobile);
        
        Log::info("Verify Mobile OTP Details: mobile={$mobile}, input_otp={$otp}, saved_otp={$savedOtp}, time=" . ($otpTime ? ($otpTime instanceof \Carbon\Carbon ? $otpTime->toIso8601String() : (string)$otpTime) : 'null'));
        
        if ($savedOtp && $otpTime && now()->diffInMinutes($otpTime) <= 5 && $savedOtp == $otp) {
            session()->put('otp_verified_' . $mobile, true);
            return response()->json(['success' => true, 'message' => 'OTP verified successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid or expired OTP'], 400);
    }
}
