<?php

namespace App\Mail;

use App\Models\CallbackRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Envelope;
use Illuminate\Queue\SerializesModels;

class CallbackRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public CallbackRequest $callbackRequest)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📞 New Callback Request - ' . $this->callbackRequest->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return view('emails.callback-request', [
            'callbackRequest' => $this->callbackRequest,
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
