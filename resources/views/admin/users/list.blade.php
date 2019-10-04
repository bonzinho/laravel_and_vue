@extends('layouts.admin')
    @section('content')
        <div class="container">
            <div class="row">
                <h4>Administradores Registados</h4>
                <a href="{{ route('admin.register_user') }}" class="btn waves-effect">Adicionar novo Administrador</a>
                <table class="bordered striped hi centered responsive-table z-deth-5">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de registo</th>
                        <th>email</th>
                        <th>Acções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">{{$user->id}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$user->name}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$user->created_at}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$user->email}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">

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