<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Newsletter extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'assunto',
        'week',
        'email',
    ];

    public function noticias(){
        return $this->belongsToMany(Noticia::class, 'newsletter_noticias');
    }

    /*public function getNoticiasListAttribute(){
        $newsletters = $this->noticias()->pluck('*')->all();
        return $newsletters;
    }*/



}
