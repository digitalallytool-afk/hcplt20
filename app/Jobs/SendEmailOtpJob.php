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
            $otpValue = $this->otp;
            $typeValue = $this->type;
            
            Mail::raw("Your OTP for HCPL {$typeValue} is: {$otpValue}\n\nThis OTP is valid for 10 minutes.", function ($message) {
                $message->to($this->email)
                        ->subject("HCPL {$this->type} OTP");
            });
        } catch (\Exception $e) {
            Log::error("Failed to send OTP via Job to {$this->email}: " . $e->getMessage());
            throw $e; // Throwing ensures the queue worker knows it failed and can retry
        }
    }
}
