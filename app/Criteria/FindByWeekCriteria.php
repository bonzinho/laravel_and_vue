<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByWeekCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindByWeekCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $week;

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
        $queryBuilder = $model->where('week', '=', $this->week);
        return $queryBuilder;
    }
}
