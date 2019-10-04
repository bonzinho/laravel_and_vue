<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tag extends Model  implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'tag',
    ];

    public function noticias(){
        return $this->belongsToMany(Noticia::class, 'tag_noticia');
    }

}
