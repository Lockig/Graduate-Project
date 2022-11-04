<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConfirmDayOff
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $teacher_id;
    public $student_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($teacher_id,$student_id)
    {
        $this->teacher_id = $teacher_id;
        $this->student_id = $student_id;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
