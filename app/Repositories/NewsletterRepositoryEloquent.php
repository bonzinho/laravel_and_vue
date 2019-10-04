<?php

namespace App\Repositories;

use App\Events\NewsletterCreatedEvent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Newsletter;


/**
 * Class NewsletterRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class NewsletterRepositoryEloquent extends BaseRepository implements NewsletterRepository
{
    public function create(array $attributes)
    {
        $model =  parent::create($attributes);
        $model->noticias()->sync($attributes['noticias']);
        $event = new NewsletterCreatedEvent($model, $attributes['emailArray']);
        event($event);
        return $model;
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Newsletter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
