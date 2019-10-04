<?php

namespace App\Transformers;

use App\Models\Evento;
use League\Fractal\TransformerAbstract;

/**
 * Class EventosTransformer
 * @package namespace feupWorld\Transformers;
 */
class EventosTransformer extends TransformerAbstract
{

    /**
     * Transform the \Eventos entity
     * @param Evento $model
     *
     * @return array
     */
    public function transform(Evento $model)
    {
        return [
            'id'         => (int) $model->id,
            'title'      => $model->title,
            'link'       => $model->link,
            'init'       => $model->init,
            'end'        => $model->end,
            'data'       => $model->data,
            'order'     =>  (int)$model->order,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
