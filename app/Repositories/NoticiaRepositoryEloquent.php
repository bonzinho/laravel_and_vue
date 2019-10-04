<?php

namespace App\Repositories;

use App\Presenters\NoticiasPresenter;
use App\Events\NoticiaStoredEvent;
use App\Models\Tag;
use Illuminate\Http\UploadedFile;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Noticia;

/**
 * Class NoticiaRepositoryEloquent
 * @package namespace feupWorld\Repositories;
 */
class NoticiaRepositoryEloquent extends BaseRepository implements NoticiaRepository
{

    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'id',
        'created_at',
        'updated_at',
        'week',
        'state',
        'newsletter',
        'active_date',
        'order',

    ];

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['description'] = nl2br($attributes['description']);
        // verifica se existe active_date se não existir calcula a semana pela data de hoje se não pela data do active_date
        if(!$attributes['active_date']){
            $today = date("Y-m-d");
            $attributes['active_date'] = $today;
            $attributes['week'] = $this->getWeek($today);
        }else{
            $attributes['week'] = $this->getWeek($attributes['active_date']);
        }

        if(isset($attributes['photo'])){
            $photo = $attributes['photo'];
            $attributes['photo'] = env('NOTICIA_PHOTO_DEFAULT');
        }else{
            $photo = new \Illuminate\Http\UploadedFile(
                storage_path('app/files/noticias/default_image.png'), 'default_image.png');
            $attributes['photo'] = env('NOTICIA_PHOTO_DEFAULT');
        }
        $model =  parent::create($attributes);
        $model->tags()->sync($this->getTagsIds($attributes['tags']));
        $model['tags'] = $attributes['tags'];
        $event = new NoticiaStoredEvent($model, $photo);
        event($event);
        return $model;
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        //cria os espaços de linha automaticos
        //$attributes['description'] = nl2br($attributes['description']);

        // verifica se existe active_date se não existir calcula a semanapela data de hoje se não pela data do active_date
        if(!$attributes['active_date']){
            $today = date("Y-m-d");
            $attributes['active_date'] = $today;
            $attributes['week'] = $this->getWeek($today);
        }else{
            $attributes['week'] = $this->getWeek($attributes['active_date']);
        }

        $photo = null;
        if(isset($attributes['photo']) && $attributes['photo'] instanceof  UploadedFile){
            $photo = $attributes['photo'];
            unset($attributes['photo']);
        }
        $model =  parent::update($attributes, $id);
        $event = new NoticiaStoredEvent($model, $photo);
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
        return Noticia::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return NoticiasPresenter::class;
    }


    private function getWeek($created_at){
        $date = new \DateTime($created_at);
        return $date->format("W");
    }

    private function getTagsIds($tags){
        // array map passa uam função em todos os elementos do array, sendo que a função neste é o trim para retirar os espaços antes e depois de cada tag
        // array_filter elimina os elementos em branco que existem
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];

        foreach ($tagList as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['tag' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
