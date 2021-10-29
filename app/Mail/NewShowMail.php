<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewShowMail extends Mailable
{
    public $data;
    public $show;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $show)
    {
        $this->data=$data;
        $this->show=$show;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@tvpms.com')
                    ->subject('NEW SHOW INVITE')
                    ->view('mail.newshow');
    }
}
