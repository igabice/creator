<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AffiliateSale extends Notification implements  ShouldQueue
{
    use Queueable;

    public $affiliate;
    public $product;


    public function __construct($affiliate, $product)
    {
        $this->affiliate = $affiliate;
        $this->product = $product;
//        $this->buyer = $buyer;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Money Alert! '.$this->product->commission)
            ->line('Wow! '.$this->affiliate->name)
            ->line('You just earned '.$this->product->commission.' because you made a sale of '.$this->product->name.$this->product->title.'. We are so happy for you.')
            ->line('There is no stopping you at all. We are feeling your boss moves.')
            ->line('Keep flying.')
            ->line('Keep SOARING!')
            ->line('Let’s do this!!')
            ->salutation(new HtmlString("To your 7 Digits Success,<br>Yemi  <br>COO, <br>The 7D Group"));
    }

    /*


     */
}