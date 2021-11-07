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
            ->subject(' Create to Millions!')
            ->line($this->name.', you’re a super-star!')
            ->line('First of all; THANK YOU! THANK YOU!')
            ->line('… for believing in us…')
            ->line('… for choosing to register as a 7D Creator.')
            ->line('We’re blushing already!')
            ->line('We feel so grateful and honoured!')
            ->line('And you see, your ride with us is to Millions - 7 Digits!')
            ->line('Our Affiliates are super ready to make those sales for you.')
            ->line('Start creating your courses, and uploading them.')
            ->line('Leave the rest to us and our Affiliates! Watch us do some Magic!')
            ->line('Welcome to the 7D Creators’ Community.')

//            ->action('Login', url('/login'))
            ->line('We LOVE you!')
            ->line('')
            ->salutation("To 7 Digits,\n‘Yemi \nCOO");
    }

    /*


     */
}