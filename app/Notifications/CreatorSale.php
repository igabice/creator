<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class CreatorSale extends Notification implements  ShouldQueue
{
    use Queueable;

    public $creator;
    public $product;
    public $buyer;

    public function __construct($creator, $product, $buyer)
    {
        $this->creator = $creator;
        $this->product = $product;
        $this->buyer = $buyer;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Sale! Your Product is Balling!')
            ->line('Congratulations, '.$this->creator->name)
            ->line('Your Product, '.$this->product.'  just got a new sale.')
            ->line('We’re happy to tell you the good news…')
            ->line('Purchased by;')
            ->line('Name:          '.$this->buyer->name.' '.$this->buyer->last_name)
            ->line('Email:          '.$this->buyer->email)
            ->line('Whatsapp Number:      '.$this->buyer->phone)
            ->line('Please contact '.$this->buyer->name.' '.$this->buyer->last_name.', to say  THANK YOU, and to provide after-purchase service and support. ')
            ->line('Satisfy him/her like kilode… let him feel the 7DC. LOVE and SUPPORT!')
            ->line('Keep SOARING!')
            ->line('Let’s do this!!')
        ->salutation(new HtmlString("Cheers to 7 Digits!<br>Ayo Olu-Ayoola  <br>MD/CEO, The 7D Group"));
    }

    /*
     * Congratulations, [Name]!




     */
}