<?php

namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindInstaFeedByWeekCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindInstaFeedByWeekCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $week;

    /**
     * FindInstaFeedByWeekCriteria constructor.
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
        $year = Carbon::createFromFormat('Y-m-d',date("Y-m-d"))->format('Y');
        $queryArray = [
            'week' => $this->week,
            'year' => $year,
        ];
        return $model->where($queryArray);
    }
}
