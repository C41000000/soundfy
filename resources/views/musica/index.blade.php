@extends('layouts.main')

@section('content')
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box green">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <table id="lista_musica" class="table table-bordered table-striped nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nome Música</th>
                                        <th>Compositor</th>
                                        <th>Gênero</th>
                                        <th>Data Criação</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                            <a id="cadastro_musica" type="button" class="cadastro btn btn-primary" href="/musica/cadastro">
                                Cadastrar Musica
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @section('scripts')
        <script src="js/musica/index.js"></script>
    @endsection
@endsection
