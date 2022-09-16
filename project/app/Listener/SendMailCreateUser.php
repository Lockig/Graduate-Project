<?php

namespace App\Listener;

use App\Events\CreateUser;
use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailCreateUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public string $password;
    public function __construct($password)
    {
        $this->password = $password;
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        Mail::to($event->user->email)
            ->send(new ResetPasswordMail($password));
        //
    }
}
