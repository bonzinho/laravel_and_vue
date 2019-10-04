<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class WeekEvent extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'evento_id',
        'week',
        'year'
    ];

    public function eventos(){
        return $this->belongsTo(Evento::class);
    }

}
