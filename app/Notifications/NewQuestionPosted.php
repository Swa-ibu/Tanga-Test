<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuestionPosted extends Notification
{
    use Queueable;

    public $question;

    /**
     * Create a new notification instance.
     */
    public function __construct($question)
    {
        $this->question = $question;
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
                ->subject('New Question had been posted.')
                ->line('Student Name: ' . $this->question->users->name)
                ->line('Question Details: ')
                ->line($this->question->question)
                ->line('Lesson: '. $this->question->lessons->title)
                ->action('Reply Message', url(route('welcome')))
                ->line('Thank you for trusting ' .config('app.name') . '!');
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
