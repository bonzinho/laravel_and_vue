<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ShowNewsWhereActiveDateIsTodayCriteria
 * @package namespace feupWorld\Criteria;
 */
class ShowNewsWhereActiveDateIsTodayCriteria implements CriteriaInterface
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
        $queryArray = [
            ['active_date', '=', date("Y-m-d")],
        ];
        $queryBuilder = $model->where($queryArray);
        return $queryBuilder;
    }
}
