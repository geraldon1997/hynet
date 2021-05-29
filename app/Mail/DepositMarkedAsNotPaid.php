<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositMarkedAsNotPaid extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $subject, $message)
    {
        $this->fullname = $fullname;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(accountsEmail())
                    ->subject($this->subject)
                    ->markdown('emails.deposit-marked-as-not-paid')
                    ->with(['message' => $this->message, 'fullname' => $this->fullname]);
    }
}
