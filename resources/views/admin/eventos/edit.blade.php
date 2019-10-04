@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <h4>Editar evento</h4>
            {!! Form::model($evento, [
                'route' => ['admin.eventos.update',
                'noticia' => $evento->id],
                'method' => 'PUT'
                ])
            !!}

                @include('admin.eventos._form')

            <div class="row">
                {!! Form::submit('Editar Evento', ['class' => 'btn waves-effect']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection