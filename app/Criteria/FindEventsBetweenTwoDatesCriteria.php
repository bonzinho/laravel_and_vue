<?php

namespace App\Criteria;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindEventsBetweenTwoDatesCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindEventsBetweenTwoDatesCriteria implements CriteriaInterface
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
        return $model->whereDate('init', '<=', Carbon::now())
            ->whereDate('end', '>=', Carbon::now());
    }
}
