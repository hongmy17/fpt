<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $title;
    private $description;
    private $phone;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->phone  = $data['phone'];
        // gán dữ liệu chỗ này
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('tinhpv10@fpt.edu.vn', 'Jeffrey Way'),

            subject: 'Một liên hệ mới',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact',
             with: [
                'name' => $this->name,
                'title' => $this->title,
                'phone' => $this->phone,
                'description' => $this->description,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
