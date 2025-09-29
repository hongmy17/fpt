<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $title;
    private $phone;
    private $description;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->phone = $data['phone'];
        $this->description = $data['description'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(Auth::user()->email, Auth::user()->name),
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'client.mail.contact',
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
