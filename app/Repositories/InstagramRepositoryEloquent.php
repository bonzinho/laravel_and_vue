<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Presenters\InstagramPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\InstagramRepository;
use App\Models\Instagram;

/**
 * Class InstagramRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class InstagramRepositoryEloquent extends BaseRepository implements InstagramRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Instagram::class;
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
        return InstagramPresenter::class;
    }

}
