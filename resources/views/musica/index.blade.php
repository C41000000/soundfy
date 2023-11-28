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
{{--<script>--}}
{{--    let tableLista = "";--}}

{{--    let datatableLista = function () {--}}
{{--        tableLista = $('#lista_musica').DataTable({--}}
{{--            ajax: {--}}
{{--                url: '/musica/lista',--}}
{{--                type: 'GET',--}}
{{--            },--}}
{{--            columns: [--}}
{{--                {data: 'titulo_musica', name: 'musica.titulo'},--}}
{{--                {data: 'compositor', name: 'users.nome'},--}}
{{--                {data: 'nome_genero', name: 'genero.nome'},--}}
{{--                {data: 'data_criacao', name: 'musica.created_at'},--}}
{{--                {--}}
{{--                    "mRender": function (data, type, full) {--}}
{{--                        let buttons = "";--}}

{{--                        buttons += '<button  class="btn btn-xs btn-primary visualizar" title="Visualizar Música" data-id="' + full["id"] + '" type="button"><i class="glyphicon glyphicon-search"></i></button>';--}}

{{--                        buttons += '<button  class="btn btn-xs btn-primary editar" title="Editar Música" data-id="' + full["id"] + '" type="button"><i class="glyphicon glyphicon-pencil"></i></button>';--}}

{{--                        buttons += '<button  class="btn btn-xs btn-danger delete" title="Deletar Música" data-id="' + full["id"] + '" type="button"><i class="glyphicon glyphicon-remove"></i></button>';--}}

{{--                        return buttons;--}}
{{--                    },--}}
{{--                    "width": "15%"--}}
{{--                }--}}
{{--            ]--}}
{{--        });--}}
{{--    };--}}
{{--    datatableLista();--}}
{{--</script>--}}
