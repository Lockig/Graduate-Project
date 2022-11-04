<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ConfirmDayOff;
use App\Notifications\ConfirmDayOffNotification;
use Illuminate\Support\Facades\Notification;

class sendConfirmDayOffNotification
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
        $student = User::find($event->student_id);
        $teacher = User::find($event->teacher_id);
        Notification::send($student, new ConfirmDayOffNotification($teacher));
        //
    }
}
