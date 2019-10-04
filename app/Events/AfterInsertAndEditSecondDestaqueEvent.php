<?php

namespace App\Events;

use AppApp\Models\SecondNotificacao;
use App\Repositories\SecondNotificacaoRepository;
use Illuminate\Http\UploadedFile;

class AfterInsertAndEditSecondDestaqueEvent
{
    /**
     * @var UploadedFile
     */
    private $destaque;
    /**
     * @var SecondNotificacaoRepository
     */
    private $repository;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(UploadedFile $destaque = null, SecondNotificacao $repository)
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
     * @return SecondNotificacaoRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }



}
