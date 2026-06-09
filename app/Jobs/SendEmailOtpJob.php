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
                $messageText = "Dear User,\n\nYour OTP for password reset on the Haryana Cricket Premier League (HCPL) portal is {$this->otp}. This OTP is valid for 5 minutes. Please do not share this OTP with anyone.\n\nRegards,\nTeam HCPL\n-ARK NEXTGEN SPORTS PRIVATE LIMITED";
            } else {
                $subject = "HCPL Registration OTP";
                $messageText = "Dear User,\n\nYour OTP for registration/login to the Haryana Cricket Premier League (HCPL) portal is {$this->otp}. This OTP is valid for 5 minutes. Please do not share this OTP with anyone.\n\nRegards,\nTeam HCPL\n-ARK NEXTGEN SPORTS PRIVATE LIMITED";
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
