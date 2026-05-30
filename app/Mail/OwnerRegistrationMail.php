<?php

namespace App\Mail;

use App\Models\OwnerRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OwnerRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $owner;

    public function __construct(OwnerRegistration $owner)
    {
        $this->owner = $owner;
    }

    public function build()
    {
        return $this->subject('New Team Owner Registration - ' . $this->owner->brand_name)
                    ->view('emails.owner_registration');
    }
}
