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
                                            <th>Artistas</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

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
