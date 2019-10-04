<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class SecondNotificacao extends Model
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
