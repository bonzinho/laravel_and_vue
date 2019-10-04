<?php

namespace App\Events;

use App\Models\Newsletter;
use App\Repositories\NewsletterRepository;


class NewsletterCreatedEvent
{
    /**
     * @var Newsletter
     */
    private $newsletter;
    private $email;

    /**
     * Create a new event instance.
     *
     * @param Newsletter $newsletter
     * @param array $email
     */
    public function __construct(Newsletter $newsletter, Array $email)
    {
        $this->newsletter = $newsletter;
        $this->email = $email;
    }

    /**
     * @return Newsletter
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @return array
     */
    public function getEmail()
    {
        return $this->email;
    }




}
