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
            ->subject('You be correct guy! '.$this->name)
            ->line($this->name.', welcome!!')
            ->line('You’re ready to start balling….!!')
            ->line('You know what we do on 7DC.')
            ->line('WE SOAR in 7DC.!')
            ->line('Yes, we soar in 7 Digits Commissions!')
            ->line('So, '.$this->name)
            ->line($this->name.', there are challenges for you to win per month (where you can win Mercedes Benz, Lexus, Dubai Trip, iPhone, or Insurance package etc.)')
            ->line('All you need to do;')
            ->line('Start selling and make as many sales as possible.')
            ->line('Make those 7 Digits Flow….')
            ->line('SOAR'.$this->name.'!!')
            ->line('SOARlike an Eagle!')
            ->line('')
            ->salutation("Cheers to 7D Commissions,\n‘Yemi \nCOO");
//            ->line(new HtmlString('<p>Follow @7dc on Facebook by clicking  <a href="http://www.facebook.com/7dc" style="color: #0d95e8">here</a></p>'))


    }

    /*
     *
Go to your dashboard; choose any Course, or Bundle that you LOVE.

And Click on “Sell Product” to activate it for selling...

Click on your “Dashboard” to copy Your Unique Affiliate Link for the product.

[Name], there are challenges for you to win per month (where you can win Mercedes Benz, Lexus, Dubai Trip, iPhone, or Insurance package etc.)

All you need to do;

Start selling and make as many sales as possible.

Make those 7 Digits Flow….

SOAR, [Name]!!

SOAR like an Eagle!

Cheers to 7D Commissions,
‘Yemi
COO



     */
}