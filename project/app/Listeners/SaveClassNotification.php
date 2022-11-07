<?php

namespace App\Listeners;

use App\Notifications\ClassNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SaveClassNotification
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
        foreach ($event->students as $student){
            Notification::send($student, (new ClassNotification($event->teacher, $event->content)));
        }
        //
    }
}
