<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message, $fullname)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->fullname = $fullname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(accountsEmail(), config('app.name'))
                    ->subject($this->subject)
                    ->markdown('emails.deposit-confirmed')
                    ->with(['message' => $this->message, 'fullname' => $this->fullname]);
    }
}
