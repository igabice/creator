<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewCreator extends Notification implements  ShouldQueue
{
    use Queueable;

    public $name;

    public function __construct( $name)
    {
        $this->name = $name;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome on board!')
            ->line($this->name.', Thank you!')
            ->line('We’re happy to have you on 7dc platform')
            ->line('Focus on creating your digital products; and we will handle the selling for you!')
            ->line('Start creating, and join us as we revolutionise the digital economy in Nigeria.')
            ->action('Login', url('/login'))
            ->line('Thank you!');
    }

    /*



     */
}