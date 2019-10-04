@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="card-panel teal">
                  <span class="white-text">
                      Newsletters enviadas: {{count($newsletters)}}
                  </span>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="card-panel teal">
                  <span class="white-text">
                      Notícias criadas este ano: {{count($noticias)}}
                  </span>
                </div>
            </div>
        </div>
    </div>
@endsection
