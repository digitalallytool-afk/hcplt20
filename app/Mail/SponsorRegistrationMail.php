<?php

namespace App\Mail;

use App\Models\SponsorRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sponsor;

    public function __construct(SponsorRegistration $sponsor)
    {
        $this->sponsor = $sponsor;
    }

    public function build()
    {
        return $this->subject('New Sponsorship Inquiry - ' . $this->sponsor->company_name)
                    ->view('emails.sponsor_registration');
    }
}
