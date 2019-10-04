<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Noticia extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'video',
        'link',
        'state',
        'newsletter',
        'week',
        'active_date',
        'order',
        'intro_text',
        'tweet',
    ];

    public static function photoDir(){
        return 'noticias/images';
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_noticias');
    }

    public function newsletters(){
        return $this->belongsToMany(Newsletter::class, 'newsletter_noticias');
    }

    // atributos dinamicos para aceder as tags associadas as noticias,
    // é obrigatoro ter o get - NomedoAtributodinamico - Attribute
    public function getTagListAttribute(){
        $tags = $this->tags()->pluck('tag')->all();
        return implode(', ', $tags);
    }



}
