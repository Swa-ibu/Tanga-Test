<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactMessageEmail extends Notification
{
    use Queueable;

    public $msg;

    /**
     * Create a new notification instance.
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
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
            ->greeting('Hello, ')
            ->line('New Message have been sent.')
            ->subject('New Contact Message from ' . $this->msg->name)
            ->line('Contact Info: ' . $this->msg->email)
            ->line('Subject: '. $this->msg->subject)
            ->line('Message: ' . $this->msg->message)
            ->action('Reply Message', url(route('welcome')))
            ->line('Thank you for trusting '.config('app.name'));
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
