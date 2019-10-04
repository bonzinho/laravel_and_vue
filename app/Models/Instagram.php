<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Instagram extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'insta_id',
        'code',
        'image',
        'likes',
        'date',
        'text',
        'week',
        'year',
        'insta_link'
    ];
}
