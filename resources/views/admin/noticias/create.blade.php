@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <h4>Criar notícia</h4>
                {!! Form::open(['route' => 'admin.noticias.store', 'files' => true]) !!}

                @include('admin.noticias._form')

                <div class="row">
                    {!! Form::submit('Inserir Notícia', ['class' => 'btn waves-effect']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="input-field col s12 m6 l6">

            </div>

        </div>
    </div>
@endsection


