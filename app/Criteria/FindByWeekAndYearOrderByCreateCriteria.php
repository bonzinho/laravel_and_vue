<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByWeekAndYearOrderByCreateCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindByWeekAndYearOrderByCreateCriteria implements CriteriaInterface
{


    /**
     * @var
     */
    private $week;
    /**
     * @var
     */
    private $year;

    public function __construct($week, $year)
    {

        $this->week = $week;
        $this->year = $year;
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
        $queryBuilder = $model->where('week', "=", $this->week);
        return $queryBuilder;
    }
}
