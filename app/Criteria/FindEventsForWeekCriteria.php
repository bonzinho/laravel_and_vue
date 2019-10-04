<?php

namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindEventsForWeekCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindEventsForWeekCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $week;

    /**
     * FindEventsForWeekCriteria constructor.
     */
    public function __construct($week)
    {
        $this->week = $week;
    }


    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model->where('week_events', function($query){
           $query->where('week', '=', $this->week);
        })->get();
    }
}
