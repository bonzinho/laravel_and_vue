@include('errors._error_field')
<?php  $errorClass =  $errors->first('title')? ['class' => 'validate invalid']:[]  ?>

<div class="row">
    <div class="col s12 m8">
        <h4>Adicionar novo segundo destque</h4>
        <div class="input-field col s12">
            <div class="row">
                <div class="switch">
                    {!! Form::hidden('state', '0') !!}
                    @if(isset($notificacao))
                    <label>Não Ativo{!! Form::checkbox('state', '1', $notificacao->state, ['id' => 'chk_state']) !!}<span
                            class="lever"></span>Ativo</label></div>
                    @else
                    <label>Não Ativo{!! Form::checkbox('state', '1', true, ['id' => 'chk_state']) !!}<span
                                class="lever"></span>Ativo</label></div>
                    @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('name', null, $errorClass) !!}
        {!! Form::label('name', 'Nome do destaque', ['data-error' => $errors->first('name')]) !!}
    </div>
</div>
<div class="row">
    <div class="file-field input-field col s12">
        <div class="btn">
            <span>Imagem</span>
            {!! Form::file('img', null, ['data-error' => $errors->first('img')]) !!}
        </div>
        <div class="file-path-wrapper">
            {!! Form::text('', 'Selecione a imagem', ['class' => 'file-path validate']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        {!! Form::text('url', null, $errorClass) !!}
        {!! Form::label('url', 'Link externo (http://link.com)', ['data-error' => $errors->first('url')]) !!}
    </div>
</div>