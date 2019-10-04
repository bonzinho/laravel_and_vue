<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WeekEventRepository;
use App\Models\WeekEvent;
use App\Validators\WeekEventValidator;

/**
 * Class WeekEventRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class WeekEventRepositoryEloquent extends BaseRepository implements WeekEventRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WeekEvent::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
