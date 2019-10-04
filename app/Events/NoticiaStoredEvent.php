<?php

namespace App\Events;

use App\Models\Noticia;
use Illuminate\Http\UploadedFile;

class NoticiaStoredEvent
{

    private $noticia;
    private $photo;

    /**
     * Create a new event instance.
     *
     * @param Noticia $noticia
     * @param UploadedFile $photo
     */
    public function __construct(Noticia $noticia, UploadedFile $photo = null)
    {
        $this->noticia = $noticia;
        $this->photo = $photo;
    }

    /**
     * @return Noticia
     */
    public function getNoticia()
    {
        return $this->noticia;
    }

    /**
     * @return $photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }





}
