@extends('layouts.admin')
<?php  $errorClass =  $errors->first('nome')? ['class' => 'validate invalid']:[]  ?>
    @section('content')
        <div class="container">
            <div class="row">
                @if(Session::has('toasts'))
                    @foreach(Session::get('toasts') as $toast)
                        <ul class="collection">
                            <li class="collection-item {{ $toast['level'] }} white-text">{{ $toast['message'] }}</li>
                        </ul>
                    @endforeach
                @endif
                <div class="col s12 m6">
                    {!! Form::open(['route' => ['admin.second-notificacao.store'], 'method' => 'POST','files' => true])!!}
                        @include('admin.second_notificacao._form')
                    <div class="row">
                        {!! Form::submit('Criar / Editar', ['class' => 'btn waves-effect']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <h4>Lista de destaques</h4>
                <table class="bordered striped hi centered responsive-table z-deth-5">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Semana</th>
                        <th>Titulo</th>
                        <th>Acções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notificacoes as $notificacao)
                        <tr>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12"> {{$notificacao->id}} </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12 text-right">
                                        <strong>
                                            {{$notificacao->week}}
                                        </strong>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s4">
                                        <img src="{{asset("/storage/destaques/{$notificacao->img}")}}" class="noticia-table-image"/>
                                    </div>
                                    <div class="col s8">
                                        <span class="left">{{$notificacao->name}}</span>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        <a href="{{route('admin.second-notificacao.edit', ['notificacao' => $notificacao->id])}}">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection