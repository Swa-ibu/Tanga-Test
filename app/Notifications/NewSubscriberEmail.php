<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriberEmail extends Notification
{
    use Queueable;

    public $subsciber;

    /**
     * Create a new notification instance.
     */
    public function __construct($subsciber)
    {
        $this->subsciber = $subsciber;
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
                    ->greeting('Hello ')
                    ->subject('New Subscriber Subscribed')
                    ->line('Subscribers Details. ')
                    ->line('Name: '. $this->subsciber->name)
                    ->line('Email: '. $this->subsciber->email)
                    ->action('View List', url(route('admin.subscriber')))
                    ->line('Thank you for trusting '. config('app.name'));
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
