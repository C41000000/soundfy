@extends('layouts.main')
@section('title', 'Projetos Musicais');
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12 tabelas" >
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-pane active" id="tab_0">
                        <div class="portlet box green">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <table id="lista_projeto" class="table table-bordered table-striped nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Projeto</th>
                                            <th>Descrição</th>
                                            <th>Artistas</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if($projetos)
                                                @foreach($projetos as $cada_projeto)
                                                    <tr>
                                                        <td>{{$cada_projeto->nome}}</td>
                                                        <td>{{$cada_projeto->descricao}}</td>
                                                        @if($cada_projeto['artistas'])
                                                            <td>
                                                            @foreach($cada_projeto['artistas'] as $cada_art)
                                                                {{ $cada_art->nome}},
                                                            @endforeach
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="{{route('ver-projeto', $cada_projeto->id_projeto)}}"><i class="ri-eye-line"></i></a>
                                                            @if( session()->get('user') && $cada_projeto->usr_id == session()->get('user')->usr_id)
                                                            <a href="{{route('editar-projeto', $cada_projeto->id_projeto)}}"><i class="ri-pencil-line"></i></a>
                                                            <a href="{{route('deletar-projeto', $cada_projeto->id_projeto)}}"><i class="ri-delete-bin-7-line"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @if(session()->has('user'))
                            <div class="form-actions text-center create-button">
                                <a id="cadastro_musica" type="button" class="cadastro btn btn-primary" href="{{route('criar-projeto')}}">
                                    Cadastrar Projeto
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="<?php echo asset('js/projeto-musical/index.js')?>"></script>
    @endsection
@endsection
