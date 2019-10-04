<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Instagram;

/**
 * Class InstagramTransformer
 * @package namespace feupWorld\Transformers;
 */
class InstagramTransformer extends TransformerAbstract
{

    /**
     * Transform the \Instagram entity
     * @param \Instagram $model
     *
     * @return array
     */
    public function transform(Instagram $model)
    {
        return [
            'insta_id' => $model->insta_id,
            'code' => $model->code,
            'image' => $model->image,
            'likes' => $model->likes,
            'date' => $model->date,
            'text' => $model->text,
            'insta_link' => $model->insta_link
        ];
    }
}
