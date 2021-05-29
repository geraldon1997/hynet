<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        $this->fullname = request()->fullname;
        $this->subject = $subject;
        $this->message = $message;
        $this->details = request()->all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(helloEmail(), config('app.name'))
                    ->subject($this->subject)
                    ->markdown('emails.welcome-user')
                    ->with(['fullname' => $this->fullname, 'message' => $this->message, 'details' => $this->details]);
    }
}
