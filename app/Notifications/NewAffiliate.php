<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class NewAffiliate extends Notification implements  ShouldQueue
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
            ->subject('Welcome to the Largest sales hack nation')
            ->line($this->name.', you’re welcome to Affiliatedng')
            ->line('Congratulations, I’m super excited that you are here! Wooo!')
            ->line('I’m so happy, I must tell you. And this is why.')
            ->line('We built this platform with you in mind.')
            ->line('A place where you can call home, a home where you can rake in millions of naira monthly, weekly sef, and if you want to vex finally, rake in millions daily!')
            ->line('So, now that you’re here…')
            ->line('Please, go to your dashboard here, I’ve recorded a video for you, explaining what you should expect and how to make the best and most-profitable use of this platform.')
            ->action('home', url('/login'))
            ->line('See you there.')
            ->line('In the meantime;')
            ->line(new HtmlString('<p>Follow @7dc on Facebook by clicking  <a href="http://www.facebook.com/7dc" style="color: #0d95e8">here</a></p>'))
            ->line(new HtmlString('<p>and on instagram by clicking  <a href="http://www.instagram.com/7dc" style="color: #0d95e8">here</a></p>'))
            ->line('Thank you');
    }

    /*


     */
}