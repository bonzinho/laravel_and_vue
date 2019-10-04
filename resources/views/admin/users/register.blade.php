@extends('layouts.admin')
<?php  $errorClass =  $errors->first('name')? ['class' => 'validate invalid']:[]  ?>
@section('content')

    @extends('errors._error_field')

<div class="container">
    {!! Form::open(['route' => 'admin.user.store', 'files' => true]) !!}
    <div class="row">
        <div class="input-field col s6">
            {!! Form::text('name', null, $errorClass) !!}
            {!! Form::label('name', 'Nome', ['data-error' => $errors->first('name')]) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            {!! Form::text('email', null, $errorClass) !!}
            {!! Form::label('email', 'Email', ['data-error' => $errors->first('email')]) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            {!! Form::password('password', null, $errorClass) !!}
            {!! Form::label('password', 'Password', ['data-error' => $errors->first('password')]) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            {!! Form::password('password-confirm', null, $errorClass) !!}
            {!! Form::label('password-confirm', 'Confirmar Password', ['data-error' => $errors->first('password-confirm')]) !!}
        </div>
    </div>
    <div class="row">
        {!! Form::submit('Registar', ['class' => 'btn waves-effect']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
