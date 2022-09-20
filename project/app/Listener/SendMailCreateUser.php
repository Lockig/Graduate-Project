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
    public function __construct()
    {
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
        $details = [
            'password'=>$event->user->account->password
        ];
        Mail::to($event->user->email)
            ->send(new ResetPasswordMail($details));
        //
    }
}
