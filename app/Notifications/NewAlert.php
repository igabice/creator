<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class NewAlert extends Notification implements  ShouldQueue
{
    use Queueable;

    public $data;
    public $subject;

    public function __construct($subject, $data)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
//            ->line($this->data)
            ->line(new HtmlString($this->data));
    }

    /*

    Please, go to your dashboard here, I’ve recorded a video for you, explaining
what you should expect and how to make the best and most-profitable use of this
platform.
See you there.
In the meantime;
Join the whatsapp support group here.
Join the Telegram support group here
Follow us on Instagram and facebook here.
Thank you.
To Your 7D Success,
Dr Ayo OluAyoola





     */
}