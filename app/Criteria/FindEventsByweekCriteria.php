<?php

namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindEventsByweekCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindEventsByweekCriteria implements CriteriaInterface
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
        $today = date('Y-m-d');
        $queryArray = [
            'week' => (int)Carbon::createFromFormat('Y-m-d', $today)->format('W'),
            'year' => (int)Carbon::createFromFormat('Y-m-d', $today)->format('Y'),
        ];
        return $model->where($queryArray);
    }
}
