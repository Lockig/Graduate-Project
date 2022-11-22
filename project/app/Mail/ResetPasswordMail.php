<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public $email;
    public function __construct($details,$email)
    {
        $this->details = $details;
        $this->email=$email;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->details;
        $email = $this->email;
        return $this->from('minhntt2001hn@gmail.com','Example')
                    ->subject('Reset password')
                    ->markdown('mail', compact(['details','email']));
    }
}
