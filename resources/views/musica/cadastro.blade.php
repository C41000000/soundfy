@extends('layouts.main')
@section('styles')
    <link href="../../css/musica/cadastro.css">
@endsection
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
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cadastrar Gênero</button>
                        <div class="portlet-body form" style="padding: 5%">
                            <form id="formCadastroMusica" role="form" method="POST" action="/musica/store" target="_blank">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Genero da Musica</label>
                                                <div class="input-group">
                                                    <select name='id_genero' class="form-control select2" style="width: 100%;">
                                                        <option value="">Selecione</option>
                                                        @foreach($generos as $genero)
                                                            <option value="{{$genero->id_genero}}">{{$genero->nome}}</option>
                                                        @endforeach
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
<!-- Modal -->
<div class="modal modal-lg fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: linear-gradient(to bottom, #6d0680, #2a0f57) !important;">
        <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Novo Post</h1>
        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="genero-form">
              @csrf
                <div class="mb-3 col-4">
                    <label for="titulo" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome-genero" >
                </div>
              <div class="mb-3 col-4">
                    <label for="titulo" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="descricao-genero" >
              </div>

            </form>
      </div>
      <div class="modal-footer">
        <button id='fechar' type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id='store-genero' type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
    <script>
        $('.cadastro').on('click', function () {
            let dados = $("#formCadastroMusica").serializeArray();
            $.ajax({
                url: '/musica/cadastro',
                type: 'POST',
                data: dados,
                success: function (data) {

                },
                error: function (data) {

                }
            });
        })

        $("#store-genero").click(function (e){
            e.preventDefault();
            let token = $("[name=_token]").val();
            let nome = $("#nome-genero").val();
            let descricao = $("#descricao-genero").val();

            if(!nome || !descricao){
                alert("É necessário preencher todos os campos");
                return;
            }

            $.ajax({
                url:'{{route('store')}}',
                type: 'POST',
                data: {
                    nome: nome,
                    descricao : descricao,
                    _token : token
                },
                success:function(response){
                    alert('Gênero criado com sucesso!');
                    $("#fechar").trigger('click');
                    let opt = "<option value='" + response.id_genero+"'>"+ response.nome+"</option>";
                    $('[name=id_genero').append(opt);
                },
                error:function (response = false){
                    alert('Ocorreu um erro ao criar o gênero');
                }
            })
        });

    </script>
@endsection
