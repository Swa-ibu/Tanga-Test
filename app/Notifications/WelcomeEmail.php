<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmail extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Dear '. $this->user->name . ',')
                    ->subject('Welcome to '. config('app.name'). ' E-learning Platform')
                    ->line('Welcome to ' . config('app.name'))
                    ->line(config('app.name') . 'welcomes all students for a new curriculum and a new beginning as students rises an education level higher in new classes. We extend the best wishes for the studies and expect best of results from them.')
                    ->line(config('app.name') .' is a special place, and we want you to enjoy the campus, take full advantage of everything the platform offers and, in doing so, we encourage you to take appropriate personal and collective precautions when living, learning, working, and playing on the platform.')
                    ->action('Start Learning Now', url(route('student.dashboard')))
                    ->line('Thank you!')
                    ->line('Regards, ')
                    ->line('Nancy Njeri, School Admin');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
