<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname)
    {
        $this->fullname = $fullname;
        $this->subject = request()->subject;
        $this->message = request()->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(infoEmail(), config('app.name'))
                    ->subject($this->subject)
                    ->markdown('emails.contact-user')
                    ->with(['message' => $this->message, 'fullname' => $this->fullname]);
    }
}
