@extends('layouts.admin')
@section('content')
    <?php  $errorClass =  $errors->first('nome')? ['class' => 'validate invalid']:[]  ?>
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <img src="{{asset("storage/destaques/{$notificacao->img}")}}" class="materialboxed" width="100%"/>
            </div>
            <div class="input-field col s12 m12 l12">
                <h4>Editar destaque</h4>
                {!! Form::model($notificacao, [
                        'route' => ['admin.notificacao.update',
                        'notificacao' => $notificacao->id],
                        'method' => 'PUT',
                        'files' => true ]) !!}
                @include('admin.notificacoes._form')
                <div class="row">
                    {!! Form::submit('Editar destaque', ['class' => 'btn waves-effect']) !!}
                </div>
                {!! Form::close() !!}
            </div>



        </div>
    </div>
@endsection


@section('javascript')
    <script type="text/javascript">
        if('{{$notificacao->state}}' == 1){
            $('#banner').prop('checked');
        }
    </script>
@endsection

