@extends('layouts.admin')
    @section('content')
        <div class="container">
            <div class="row">
                <h4>Eventos</h4>
                <a href="{{ route('admin.eventos.create') }}" class="btn waves-effect">Inserir Evento</a>
                <table class="bordered striped hi centered responsive-table z-deth-5">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                        <th>Acções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventos as $evento)
                        <tr>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12"> {{$evento->id}} </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        <span class="left">{{$evento->title}}</span>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="col s12">
                                    {{$evento->init}}
                                </div>
                            </td>
                            <td>
                                <div class="col s12">
                                    {{$evento->end}}
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        <a href="{{route('admin.eventos.edit', ['evento' => $evento->id])}}">Editar</a> |
                                        <delete-action action="{{route('admin.eventos.destroy', ['noticia' => $evento->id])}}"
                                                       action-element="link-delete-{{$evento->id}}" csrf-token="{{csrf_token()}}">
                                            <?php $modalId = "modal-delete-$evento->id"; ?>
                                            <a id="link-modal-{{$evento->id}}" href="#{{ $modalId }}">Apagar</a>
                                            <modal :modal="{{json_encode(['id' => $modalId ])}}" style="display:none;" >
                                                <div slot="content">
                                                    <h4>ATENÇÃO</h4>
                                                    <p><strong>Tem a certeza que pretende excluir este evento?</strong></p>
                                                    <div class="divider"></div>
                                                    <p>Nome: <strong>{{$evento->title}}</strong></p>
                                                    <div class="divider"></div>
                                                </div>
                                                <div slot="footer">
                                                    <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action"
                                                            id="link-delete-{{$evento->id}}">OK</button>
                                                    <button class="btn btn-flat waves-effect waves-red lighten-2 modal-close modal-action">Cancelar</button>
                                                </div>
                                            </modal>
                                        </delete-action>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $eventos->links() !!}
            </div>
        </div>
    @endsection