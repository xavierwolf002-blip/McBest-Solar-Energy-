<?php

namespace App\Mail;

use App\Models\McBestCallback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Envelope;
use Illuminate\Queue\SerializesModels;

class McBestCallbackMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public McBestCallback $callback)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📞 New Callback Request - ' . $this->callback->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return view('emails.mcbest-callback', [
            'callback' => $this->callback,
        ]);
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
