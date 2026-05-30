<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEnquiryMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Enquiry - ' . $this->details['name'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_enquiry',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
