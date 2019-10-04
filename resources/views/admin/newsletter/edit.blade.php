@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <h4>Editar notícia</h4>
                {!! Form::model($noticia, [
                    'route' => ['admin.noticias.update',
                    'noticia' => $noticia->id],
                    'method' => 'PUT',
                    'files' => true
                    ])
                !!}

                @include('admin.noticias._form')

                <div class="row">
                    {!! Form::submit('Editar Notícia', ['class' => 'btn waves-effect']) !!}
                </div>
                {!! Form::close() !!}
            </div>


            <div class="input-field col s12 m6 l6">
                <img src="{{asset("storage/noticias/images/{$noticia->photo}")}}" class="materialboxed" width="100%"/>
            </div>
        </div>
    </div>
@endsection