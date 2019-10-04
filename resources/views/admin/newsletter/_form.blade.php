@include('errors._error_field')
<?php  $errorClass =  $errors->first('assunto')? ['class' => 'validate invalid']:[]  ?>

<div class="row">
    <div class="input-field col s12">
        {!! Form::text('assunto', null, $errorClass) !!}
        {!! Form::label('assunto', 'Assunto', ['data-error' => $errors->first('assunto')]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('email', null, $errorClass) !!}
        {!! Form::label('Email', 'Email de destino', ['data-error' => $errors->first('email')]) !!}
    </div>
</div>