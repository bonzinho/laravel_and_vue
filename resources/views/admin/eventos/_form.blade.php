@include('errors._error_field')
<?php  $errorClass =  $errors->first('title')? ['class' => 'validate invalid']:[]  ?>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('title', 'Título') !!}
        {!! Form::text('title', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('order', 'Ordem') !!}
        {!! Form::number('order', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('link', 'Link para do evento (http://youtube.com/******)') !!}
        {!! Form::text('link', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('data', 'Data do Evento (20 de janeiro a 2 de fev)') !!}
        {!! Form::text('data', null) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('init', 'Data inicio do evento') !!}
        {!! Form::text('init', null, ['data-toggle' => 'datepicker']) !!}
    </div>
    <div class="input-field col s6">
        {!! Form::label('end', 'Data fim do evento') !!}
        {!! Form::text('end', null, ['data-toggle' => 'datepicker']) !!}
    </div>
</div>