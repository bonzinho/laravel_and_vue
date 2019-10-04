<?php

namespace App\Transformers;

use App\Models\Noticia;
use League\Fractal\TransformerAbstract;

/**
 * Class NoticiasTransformer
 * @package namespace feupWorld\Transformers;
 */
class NoticiasTransformer extends TransformerAbstract
{

    /**
     * Transform the \Noticia entity
     * @param Noticia $model
     *
     * @return array
     */
    public function transform(Noticia $model)
    {
        return [
            'id'         => (int) $model->id,
            'title' => $model->title,
            'description' => $model->description,
            'photo' => $model->photo,
            'video' => $model->video,
            'link' => $model->link,
            'week' => (int)$model->week,
            'tags' => $model->tags,
            'order' => $model->order,
            'intro_text' => $model->intro_text,
            'active_date' => $model->active_date,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
