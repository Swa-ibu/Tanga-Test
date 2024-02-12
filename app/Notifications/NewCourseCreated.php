<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCourseCreated extends Notification
{
    use Queueable;

    public $course;

    /**
     * Create a new notification instance.
     */
    public function __construct($course)
    {
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
                    ->subject($this->course->name. ' Course now available')
                    ->greeting('Dear Student. ' )
                    ->line('The programme has been designed to empower you to study independently for the majority of the programme, by watching, pausing, and returning to teaching sessions at your own pace.
                            You will participate in live and scheduled sessions as well as group-based work, requiring attendance and engagement throughout the course. You can expect assignments with deadlines and specified requirements for submission.
                            The next deadline to apply is: Friday, June 30')
                    ->action('Enroll now', url(route('student.course')))
                    ->line('Happy Learning!');
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
