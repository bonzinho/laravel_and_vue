<?php

namespace App\Events;

use App\Models\Notificacao;
use App\Repositories\NotificacaoRepository;
use Illuminate\Http\UploadedFile;

class AfterInsertAndEditDestaqueEvent
{
    /**
     * @var UploadedFile
     */
    private $destaque;
    /**
     * @var NotificacaoRepository
     */
    private $repository;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UploadedFile $destaque = null, Notificacao $repository)
    {
        $this->destaque = $destaque;
        $this->repository = $repository;
    }

    /**
     * @return UploadedFile
     */
    public function getDestaque()
    {
        return $this->destaque;
    }

    /**
     * @return NotificacaoRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }



}
