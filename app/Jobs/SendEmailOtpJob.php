<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendEmailOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $otp;
    public $type;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $otp, $type = 'Registration')
    {
        $this->email = $email;
        $this->otp = $otp;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            if ($this->type === 'Password Reset') {
                $subject = "HCPL Password Reset OTP";
                $messageText = "Dear User,\n\nYour OTP for HCPL password reset is {$this->otp}. Valid for 5 minutes. Do not share this OTP with anyone.\n\nTeam HCPL";
            } else {
                $subject = "HCPL Registration OTP";
                $messageText = "Dear User,\n\nOTP for HCPL registration/login is {$this->otp}. Valid for 5 mins. Do not share it.\n\nTeam HCPL";
            }
            
            Mail::raw($messageText, function ($message) use ($subject) {
                $message->to($this->email)
                        ->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error("Failed to send OTP via Job to {$this->email}: " . $e->getMessage());
            throw $e; // Throwing ensures the queue worker knows it failed and can retry
        }
    }
}
