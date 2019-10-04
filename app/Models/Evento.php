<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Evento extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'eventos'; // para definir o nome da tabela, principalmente no termos em portugues que muita vezes nao fica direito

    protected $fillable = [
        'title',
        'link',
        'init',
        'end',
        'data',
        'week',
        'year',
        'order'
    ];

    public function week_events(){
        return $this->hasMany(WeekEvent::class);
    }

}
