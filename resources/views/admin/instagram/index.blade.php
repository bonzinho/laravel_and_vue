@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row" style="margin-top:20px;">
            @if(Session::has('toasts'))
                @foreach(Session::get('toasts') as $toast)
                    <ul class="collection">
                        <li class="collection-item {{ $toast['level'] }} white-text">{{ $toast['message'] }}</li>
                    </ul>
                @endforeach
            @endif
            @if($feedSelecionado)
                <div class="col s12 m6 l6">
                    <div class="chip">
                        Foto selecionada para a semana {{$week}}
                    </div>
                    <img class="responsive-img" src="{{$feedSelecionado['image']}}" alt="">
                    <div class="row">
                        <div class="col s6">
                            {{ Form::open(['route' => ['admin.instagram.destroy', $feedSelecionado->id], 'method' => 'delete']) }}
                            {!! Form::submit('Alterar feed', ['class' => 'btn waves-effect']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col s6">
                            <a href="{{  route('admin.listFeeds') }}" class="btn waves-effect">Ver feeds</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6"></div>
            @endif
                @if(!$feedSelecionado)
                <div class="col s12">
            <h4>Selecionar Feed da semana {{$week}}</h4> <a href="{{  route('admin.listFeeds') }}" class="btn waves-effect">Ver feeds</a>
            <table class="bordered striped hi centered responsive-table z-deth-5">
                <thead>
                <tr>
                    <th>#</th>
                    <th>insta_id</th>
                    <th>code</th>
                    <th>image</th>
                    <th>text</th>
                    <th>likes</th>
                    <th>date</th>
                    <th>Acções</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $key => $insta)
                    {!! Form::open(['route' => 'admin.instagram.store'])!!}
                    <tr>
                        <td>
                            <div class="col s12"> {{++$key}} </div>
                        </td>
                        <td>
                            <div class="col s12">
                                <span class="left">{{$insta['id']}}</span>
                                {!!  Form::hidden('insta_id', $insta['id'])  !!}
                            </div>
                        </td>
                        <td>
                            <div class="col s12">
                                {{$insta['id']}}
                                {!!  Form::hidden('code', $insta['id'])  !!}
                            </div>
                        </td>
                        <td>
                            <div class="col s12">
                                <img src="{{$insta['images']['standard_resolution']['url']}}" style="width:200px;"/>
                                {!!  Form::hidden('image', $insta['images']['standard_resolution']['url'])  !!}
                            </div>
                        </td>
                        <td>
                            <div class="col s12">
                                {{$insta['caption']['text']}}
                                {!!  Form::hidden('text', $insta['caption']['text'])  !!}
                            </div>
                        </td>
                        <td>
                            <div class="col s12">
                                {{$insta['likes']['count']}}
                                {!!  Form::hidden('likes', $insta['likes']['count'])  !!}
                            </div>
                        </td>
                        <td>
                            <div class="col s12">
                                {{$insta['caption']['created_time']}}
                                {!!  Form::hidden('date', $insta['caption']['created_time'])  !!}
                                {!!  Form::hidden('insta_link', $insta['link'])  !!}
                            </div>
                        </td>
                        <td>
                            <input type="submit" value="ok" class="btn waves-control">
                        </td>
                    </tr>
                    {!! Form::close() !!}
                @endforeach
                </tbody>
            </table>
                </div>
                    @endif
        </div>
    </div>
@endsection