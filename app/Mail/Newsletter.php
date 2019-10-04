<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Newsletter
     */
    public $newsletter;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\feupWorld\Models\Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.newsletter.template.semanal')->subject($this->newsletter->assunto);
    }
}
