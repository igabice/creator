<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AdminSale extends Notification implements  ShouldQueue
{
    use Queueable;

    public $affiliate;
    public $product;
    public $buyer;

    public function __construct($affiliate, $product, $buyer)
    {
        $this->affiliate = $affiliate;
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
            ->subject('New Product Sale!')
            ->line('Hello Team, we are balling….!')
            ->line('Alert don enter be that… Yaayy!!')
            ->line('Your Product, '.$this->product->name.'  just got a new sale.')
            ->line('We’re happy to tell you the good news…')
            ->line('Purchased by;')
            ->line('Name of Product:          '.$this->product->name)
            ->line('Amount:          '.$this->product->amount)
            ->line('7DC Commission:      '.$this->product->d_commission)
            ->line('')
            ->line('Sold By      ')
            ->line('Name:          '.$this->affiliate->name.' '.$this->affiliate->last_name)
            ->line('Email:          '.$this->affiliate->email)
            ->line('Whatsapp Number:      '.$this->affiliate->phone)
            ->line('Commission:      '.$this->product->commission)
            ->line('')
            ->line('Bought By      ')
            ->line('Name:          '.$this->buyer->name.' '.$this->buyer->last_name)
            ->line('Email:          '.$this->buyer->email)
            ->line('Whatsapp Number:      '.$this->buyer->phone)
            ->line('')
            ->line('Congratulations Team!')
            ->line('Cheers to more!')
            ->line('')
            ->salutation(new HtmlString("Cheers to 7 Digits!<br>Ayo Olu-Ayoola  <br>MD/CEO, The 7D Group"));

    }

    /*
     */
}