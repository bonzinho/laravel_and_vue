<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByYearCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindByYearCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $year;

    public function __construct($year)
    {
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
        $queryArray = [
            ['created_at', '>', $this->year.'-01-01'],
            ['created_at', '<', $this->year.'-12-31'],
        ];

        $queryBuilder = $model->where($queryArray);
        return $queryBuilder;
    }
}
