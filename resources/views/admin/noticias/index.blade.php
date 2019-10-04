@extends('layouts.admin')
    @section('content')
        <div class="container">
            <div class="row">
                <h4>Notícias</h4>
                <a href="{{ route('admin.noticias.create') }}" class="btn waves-effect">Inserir Notícia</a>
                <table class="bordered striped hi centered responsive-table z-deth-5">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Semana</th>
                        <th>Titulo</th>
                        <th>Data</th>
                        <th>Ordem</th>
                        <th>Acções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($noticias as $noticia)
                        <tr>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12"> {{$noticia->id}} </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12 text-right">
                                        <strong>
                                            {{$noticia->week}}
                                        </strong>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s4">
                                        <img src="{{asset("storage/noticias/images/{$noticia->photo}")}}" class="noticia-table-image"/>
                                    </div>
                                    <div class="col s8">
                                        <span class="left">{{$noticia->title}}</span>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$noticia->created_at}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        {{$noticia->order}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row valign-wrapper">
                                    <div class="col s12">
                                        <a href="{{route('admin.noticias.edit', ['noticia' => $noticia->id])}}">Editar</a> |
                                        <delete-action action="{{route('admin.noticias.destroy', ['noticia' => $noticia->id])}}"
                                                       action-element="link-delete-{{$noticia->id}}" csrf-token="{{csrf_token()}}">
                                            <?php $modalId = "modal-delete-$noticia->id"; ?>
                                            <a id="link-modal-{{$noticia->id}}" href="#{{ $modalId }}">Apagar</a>
                                            <modal :modal="{{json_encode(['id' => $modalId ])}}" style="display:none;" >
                                                <div slot="content">
                                                    <h4>ATENÇÃO</h4>
                                                    <p><strong>Tem a certeza que pretende excluir este banco?</strong></p>
                                                    <div class="divider"></div>
                                                    <p>Nome: <strong>{{$noticia->title}}</strong></p>
                                                    <div class="divider"></div>
                                                </div>
                                                <div slot="footer">
                                                    <button class="btn btn-flat waves-effect green lighten-2 modal-close modal-action"
                                                            id="link-delete-{{$noticia->id}}">OK</button>
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
                {!! $noticias->links() !!}
            </div>
        </div>
    @endsection