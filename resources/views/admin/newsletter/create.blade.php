@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <h4>Enviar nova newsletter</h4>
                {!! Form::open(['route' => 'admin.newsletter.store']) !!}

                @include('admin.newsletter._form')
                <div class="row">
                    @foreach($noticias as $noticia)
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="{{asset("storage/noticias/images/{$noticia->photo}")}}" class="materialboxed">
                                </div>
                                <div class="card-content">
                                    <span class="card-title card-title-newsletter activator grey-text text-darken-4">{{ $noticia->title }}</span>
                                    <span>{{$noticia->active_date}}</span>
                                    <p>
                                        <?php
                                        $check = false;
                                        if($noticia->newsletter == true){
                                            $check = true;
                                        }else{
                                            $check = false;
                                        }
                                        ?>
                                        {!! Form::checkbox('noticias[]', $noticia->id, $noticia->newsletter, ['id' => $noticia->id]) !!}
                                        {!! Form::label($noticia->id, 'Enviar na newslleter') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    {!! Form::submit('Enviar newsletter', ['class' => 'btn waves-effect submit-btn']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="input-field col s12 m6 l6">

            </div>

        </div>
    </div>
@endsection