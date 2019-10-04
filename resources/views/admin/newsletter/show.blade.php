@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
                <div class="card-panel teal">
                  <span class="white-text">
                      <p> <strong>{{$newsletter->assunto}}</strong></p>
                      <p><strong>Enviada no dia:</strong> {{$newsletter->created_at}}</p>
                      <p><strong>Numero de notícias enviadas:</strong> {{count($newsletter->noticias)}}</p>
                      <p><strong>Enviada para:</strong> {{$newsletter->email}}</p>
                  </span>
                </div>
            </div>
            <div class="col s12 m8 l8">
                <div class="carousel">
                    @foreach($newsletter->noticias as $noticia)
                    <a class="carousel-item" target="_blank" href="{{route('admin.noticias.edit', ['noticia' => $noticia->id])}}"><img src="{{asset("storage/noticias/images/{$noticia->photo}")}}"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection