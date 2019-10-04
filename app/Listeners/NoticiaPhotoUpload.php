<?php

namespace App\Listeners;

use App\Events\NoticiaCreatedEvent;
use App\Events\NoticiaStoredEvent;
use App\Models\Noticia;
use App\Repositories\NoticiaRepository;

class NoticiaPhotoUpload
{
    /**
     * @var NoticiaRepository
     */
    private $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NoticiaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  NoticiaStoredEvent $event
     * @return void
     */
    public function handle(NoticiaStoredEvent $event)
    {
        $noticia = $event->getNoticia();
        $photo = $event->getPhoto();
        //dd($noticia);
        if ($photo){

            $name =  $noticia->created_at != $noticia->updated_at ? $noticia->photo : md5(time().$photo->getClientOriginalName()) . '.' . $photo->guessExtension();
            $destFile = Noticia::photoDir();

            $result = \Storage::disk('public')->putFileAs($destFile, $photo, $name); // destino do arquivo | qual o arquivo | nome do arquivo

            // se for um novo registo
            if ($noticia->created_at == $noticia->updated_at){
                if($result){

                    $noticia['photo'] = $name;
                    $this->repository->update($noticia->toArray(), $noticia->id);
                }
            }

        }
    }
}
