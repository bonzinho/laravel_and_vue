<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindMinWeekFromCurrentYearCriteriaCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindMinWeekFromCurrentYearCriteria implements CriteriaInterface
{
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
        $minWeek = $model->min('week');
        return $minWeek;
    }
}
