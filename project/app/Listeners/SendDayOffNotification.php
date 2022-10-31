<?php

namespace App\Listeners;

use App\Models\User;

use App\Notifications\RequestDayOffNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendDayOffNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $teacher = User::find($event->teacher->value('teacher_id'));
        Notification::send($teacher, new RequestDayOffNotification(User::find($event->user_id)));
        //
    }
}
