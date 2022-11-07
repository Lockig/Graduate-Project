<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClassNotification extends Notification
{
    use Queueable;

    public $teacher;
    public $content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($teacher, $content)
    {
        $this->teacher = $teacher;
        $this->content = $content;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */

    public function toDatabase($notifiable)
    {

        return [
            'user_name' => $this->teacher->first_name . ' ' . $this->teacher->last_name,
            'message' => $this->content
            //
        ];
    }
}
