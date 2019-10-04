<?php

namespace App\Repositories;
use App\Events\AfterInsertAndEditDestaqueEvent;
use App\Events\AfterInsertAndEditSecondDestaqueEvent;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\SecondNotificacao;
use Illuminate\Http\UploadedFile;


/**
 * Class NotificacaoRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class SecondNotificacaoRepositoryEloquent extends BaseRepository implements SecondNotificacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SecondNotificacao::class;
    }


    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $photo = null;
        if(isset($attributes['img']) && $attributes['img'] instanceof  UploadedFile){
            $photo = $attributes['img'];
            unset($attributes['img']);
        }
        $model =  parent::update($attributes, $id);
        $event = new AfterInsertAndEditSecondDestaqueEvent($photo, $model);
        event($event);
        return $model;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }





}
