<?php

namespace App\Events;

use App\Models\Noticia;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class CronTwitterEvent
{
    use InteractsWithSockets, SerializesModels;


    /**
     * @var Noticia
     */
    private $noticia;

    public function __construct(Noticia $noticia)
    {

        $this->noticia = $noticia;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return Noticia
     */
    public function getNoticia()
    {
        return $this->noticia;
    }










}
