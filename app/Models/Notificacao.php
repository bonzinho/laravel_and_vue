<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Notificacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'url',
        'img',
        'state',
        'year',
        'week'
    ];


    public static function imgDir(){
        return 'destaques';
    }

}
