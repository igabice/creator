<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewSignup extends Notification implements  ShouldQueue
{
    use Queueable;

    public $user;
    

    public function __construct($user)
    {
        $this->user = $user;
//        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Sign Up!')
            ->line('Good News, we’ve just got a new sign up!')
            ->line('Name:          '.$this->user->name.' '.$this->user->last_name)
            ->line('Email:          '.$this->user->email)
            ->line('Whatsapp Number:      '.$this->user->phone)
            ->line('We’re SOARING!!')
            ->salutation("Signed,\nThe 7D Team");
    }

    /*

     */
}