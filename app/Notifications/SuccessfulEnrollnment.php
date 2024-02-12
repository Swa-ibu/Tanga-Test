<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuccessfulEnrollnment extends Notification
{
    use Queueable;

    public $user;
    public $course;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
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
                    ->greeting('Hello ', $this->user->name)
                    ->subject('Congrats! You\'re enrolled in  '.$this->course->name)
                    ->line('Congarulations  '.$this->user->name)
                    ->line('You\'re Enrolled in '.$$this->course->name)
                    ->line('We are excited you\'ve decided to pursue your learning journey with us. Did you know that users who learn 3 days in a row are 20x more likely to pass their course than those who don\'t? Head on over to your course and start your learning streak now!')
                    ->action('Start my Course', url(route('student.student-course')))
                    ->line('Thank you for using and trusting !' . config('app.name'));
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
