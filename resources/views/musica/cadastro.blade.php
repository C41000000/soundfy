@extends('layouts.main')

@section('content')
<div class="page-content-inner" >
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable-line boxless tabbable-reversed">
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">Cadastro Musica</div>

                        </div>
                        <div class="portlet-body form" style="padding: 5%">
                            <form id="formCadastroMusica" role="form" method="POST" action="/musica/store" target="_blank">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Genero da Musica</label>
                                                <div class="input-group">
                                                    <select name='genero_id' class="form-control select2" style="width: 100%;">
                                                        <option value="">Selecione</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Titulo da Musica</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Titulo da Musica" name="titulo" id="titulo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions text-center" style="margin-top: 5%">
                                    <button onsubmit type="button" class="cadastro btn btn-primary">
                                        Salvar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
