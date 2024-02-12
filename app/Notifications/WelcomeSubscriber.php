<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeSubscriber extends Notification
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
                ->greeting('Hello '. $this->subsciber->email)
                ->subject('Welcome to '.config('app.name').' - Lets Get Started!')
                ->line(date('l, F d, Y'))
                ->line('-------------------------------')
                ->line('Welcome to ' . config('app.name'))
                ->line('')
                ->line('To get started, we have added you to the Thrive Global Daily Newsletter and Arianna Huffington\'s On My Mind, two curated emails of our favorite reads that also includes actionable tips for enhancing your well-being, productivity, and sense of purpose.')
                ->line('We need more voices like yours contributing to our mission. If you\'re interested in bringing Thrive Global\’s Behavior Change Platform to your workplace or organization reply back to this email and a member of our team will get in touch')
                ->line('Thank you for trusting ' . config('app.name'));
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
