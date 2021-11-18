<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class NewUser extends Notification implements  ShouldQueue
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
            ->from('no-reply@7dc.ng')
            ->subject('O ya! '.$this->user->name)
            ->line(new HtmlString('<p>We are very excited to have you here. Welcome to the 7 Digits Courses Platform (7dc.ng).</p>
    <br>
    <p>We want you to know that this platform is created to offer a minimum of  7 Digits value.</p>
    <br>
    <p>If you are here because you signed up for a course of ours, you will be so pleased you did, we can assure you that. The value and skills the course you subscribed to will add to you is immense. There is no platform as dynamic and full of value as ours.</p>
    <br>
    <p>Or wait! Are you an affiliate marketer? Welcome to the money field. Watch out for the bundle offers that come from time to time. In the meantime, [Name], go make the billions.</p>
    <br>
    <p>And If you are here to sell your high-value course, we can’t wait for your course to grace our landing page. We would love to have your image in the Coaches Profile section.</p>
    <br>
    <p>In all, we welcome you to this amazing platform.</p>
    <br>


    <p>Visit <a href="https://www.7dc.ng/login"> https://wwww.7dc.ng </a>  to login to your account.</p>'))

            ->salutation(new HtmlString('Signed,<br>nThe 7D Team'));
    }

    /*

     */
}