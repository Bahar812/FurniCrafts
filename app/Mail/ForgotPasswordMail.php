<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reset_password', // Ubah ini sesuai dengan nama tampilan Anda
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // dd($this->user);
        return $this->view('emails.reset_password')
                    ->with([
                        'user' => $this->user,
                        'resetLink' => $this->generateResetLink(), // Panggil metode untuk menghasilkan tautan reset
                    ]);
    }
    /**
     * Generate the reset password link.
     */
    protected function generateResetLink()
    {
        return route('password.reset', ['token' => $this->token, 'email' => $this->user->email]);
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
