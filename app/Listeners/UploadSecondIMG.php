<?php

namespace App\Listeners;

use App\Events\AfterInsertAndEditDestaqueEvent;
use App\Events\AfterInsertAndEditSecondDestaqueEvent;
use App\Models\Notificacao;
use App\Repositories\NotificacaoRepository;
use App\Repositories\SecondNotificacaoRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadSecondIMG
{
    /**
     * @var SecondNotificacaoRepository
     */
    private $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SecondNotificacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  AfterInsertAndEditDestaqueEvent  $event
     * @return void
     */
    public function handle(AfterInsertAndEditSecondDestaqueEvent $event)
    {


            $img = $event->getDestaque();
            $destaque = $event->getRepository();
            if(!$img){
                //é um update porque já existe uma imagem
                $img = $destaque->img;
            }else{
                $name =   md5(time().$img->getClientOriginalName()) . '.' . $img->guessExtension();
                $destFile = Notificacao::imgDir();
                $result = \Storage::disk('public')->putFileAs($destFile, $img, $name); // destino do arquivo | qual o arquivo | nome do arquivo
                $attributes['img'] = $name;
                $this->repository->update($attributes, $destaque->id);
            }




        }

}
