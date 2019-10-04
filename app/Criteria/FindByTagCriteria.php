<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FindByTagCriteria
 * @package namespace feupWorld\Criteria;
 */
class FindByTagCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $tag;

    public function __construct($tag)
    {
        $this->tag = $tag;
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
        return $model->whereHas('tags', function($query){
            $query->where('tag', 'LIKE', "%$this->tag%");
        });


        //$model->whereHas('tag', '=', '$this->tag');
        //return $model;
    }
}
