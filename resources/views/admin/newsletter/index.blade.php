@extends('layouts.admin')
    @section('content')
        <div class="container">
            <div class="row">
                <h4>Newsletters enviadas</h4>
                <a href="{{ route('admin.newsletter.create') }}" class="btn waves-effect">Enviar nova Newsletter</a>
                <table class="bordered striped hi centered responsive-table z-deth-5">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Assunto</th>
                        <th>Data</th>
                        <th>Semana</th>
                        <th>Acções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsletters as $newsletter)
                        <tr>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">{{$newsletter->id}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$newsletter->assunto}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$newsletter->week}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$newsletter->created_at}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        <a href="{{route('admin.newsletter.show', ['evento' => $newsletter->id])}}">Ver</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $newsletters->links() !!}
            </div>
        </div>
    @endsection