<?php

namespace App\Listener;

use App\Events\ResetPassword;
use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;

class SendMailResetPassword implements ShouldQueue
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
     * @param  \App\Events\ResetPassword  $event
     * @return void
     */
    public function handle(ResetPassword $event)
    {
        Mail::to($event->user->email)
            ->send(new ResetPasswordMail($event->details,$event->user->email));
//        $event->user->update([
//            'password'=>Hash::make($event->user->password)
//        ]);
        //
    }
}
