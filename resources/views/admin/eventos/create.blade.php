@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <h4>Criar evento</h4>
            {!! Form::open(['route' => 'admin.eventos.store']) !!}

                @include('admin.eventos._form')

            <div class="row">
                {!! Form::submit('Inserir Evento', ['class' => 'btn waves-effect']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection