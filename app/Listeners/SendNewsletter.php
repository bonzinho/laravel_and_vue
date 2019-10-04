<?php

namespace App\Listeners;

use App\Events\NewsletterCreatedEvent;
use App\Mail\Newsletter;
use App\Repositories\NewsletterRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class SendNewsletter
{
    /**
     * @var NewsletterRepository
     */
    private $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NewsletterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  NewsletterCreatedEvent  $event
     * @return void
     */
    public function handle(NewsletterCreatedEvent $event)
    {
        $newsletter = $event->getNewsletter();
        $arrayEmails = $event->getEmail();
        /*foreach ($newsletter->noticias as $noticia){
            $numMaxCarateres = 140;
            $plainTextDescription = strip_tags($noticia->description);
            $noticia->description = substr($plainTextDescription, 0, $numMaxCarateres);
        }*/

        Mail::to(['bonzinho@fe.up.pt'])
            ->send(new Newsletter($newsletter));

    }

    private function arrangeTags($tags){
        $arrayTags = explode(" ", $tags);
        for ($x = 0; $x < count($arrayTags); $x++){
            $arrayTags[$x] = "#".$arrayTags[$x];
        }
        return implode(' ',$arrayTags);
    }
}
