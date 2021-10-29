<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewAffiliateRefferal extends Notification implements  ShouldQueue
{
    use Queueable;

    public $firstname;
    public $name;
    public $email;
    public $phone;

    public function __construct($firstname, $name, $email, $phone)
    {
        $this->firstname = $firstname;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Affiliate has registered through you! Congrats!')
            ->line('Congratulations, you’re doing this like a winner!')
            ->line('You just signed up a new affiliate! ')
            ->line('YHere are the details so you can help your new affiliate record massive success.')
            ->line('Name:          '.$this->name)
            ->line('Email:          '.$this->email)
            ->line('Phone Number:      '.$this->phone)
            ->line('Now, your work is not done. You need to lead, guide, tutor your referral, and help him succeed.')
            ->line('Go here to watch a FREE training on how you can do this effectively.')
            ->line('I’m truly happy for you,'.$this->name)
            ->line('Let’s do this!!');
    }

    /*

     */
}