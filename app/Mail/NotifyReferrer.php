<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyReferrer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($myname, $fullname)
    {
        $this->myname = $myname;
        $this->fullname = $fullname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(supportEmail(), config('app.name'))
                    ->subject('New Referral')
                    ->markdown('emails.notify-referrer')
                    ->with(['myname' => $this->myname, 'message' => $this->fullname." Registered with your referral link"]);
    }
}
