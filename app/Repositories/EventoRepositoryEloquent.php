<?php

namespace App\Repositories;

use App\Presenters\EventosPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EventoRepository;
use App\Models\Evento;

/**
 * Class EventoRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class EventoRepositoryEloquent extends BaseRepository implements EventoRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Evento::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return EventosPresenter::class;
    }


}
