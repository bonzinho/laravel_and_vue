@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <img src="{{asset("storage/noticias/images/{$noticia->photo}")}}" class="materialboxed" width="100%"/>
            </div>
            <div class="input-field col s12 m12 l12">
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



        </div>
    </div>
@endsection


@section('javascript')
    <script type="text/javascript">
        if({{$noticia->newsletter}}){
            $('#newsletter').prop('checked');
        }
        if({{$noticia->state}}){
            $('#banner').prop('checked');
        }
    </script>
@endsection

