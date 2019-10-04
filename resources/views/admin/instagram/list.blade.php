@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row" style="margin-top:20px;">
            @foreach($list as $insta)
                <div class="col s12 m3">
                    <div class="chip">
                        Semana: {{$insta->week}} | {{$insta->year}}
                    </div>
                    <img class="responsive-img" src="{{$insta->image}}" alt="">
                </div>
            @endforeach
            <div class="col s12">{!! $list->links() !!}</div>
        </div>
    </div>
@endsection