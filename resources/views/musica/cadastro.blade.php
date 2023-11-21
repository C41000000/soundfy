@extends('layouts.main')
@section('styles')
    <link href="../../css/musica/cadastro.css">
@endsection
@section('title', 'Cadastro Música')
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-pane active">
                        <div class="portlet box green">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <form id="formCadastroMusica" role="form" method="POST" action="/musica/store" target="_blank">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Genero da Música</label>
                                                    <div class="input-group">
                                                        <select name='id_genero' class="form-control select2" >
                                                            <option value="">Selecione</option>
                                                            @foreach($generos as $genero)
                                                                <option value="{{$genero->id_genero}}">{{$genero->nome}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cadastrar Gênero</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Titulo da Música</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Titulo da Música" name="titulo" id="titulo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Compositor da Música</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Compositor da Música" name="compositor" id="compositor">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Faixa MP3</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" placeholder="Faixa" name="faixa" id="faixa">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Letra da Música</label>
                                                    <div class="input-group">
                                                        <textarea name="letra" type="text" placeholder="Insira a Letra da Música" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-actions text-center">
                                    <button onsubmit type="button" class="cadastro btn btn-primary">
                                        Salvar
                                    </button>
                                </div>
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
                    $('[name=id_genero]').append(opt);
                },
                error:function (response = false){
                    alert('Ocorreu um erro ao criar o gênero');
                }
            })
        });

    </script>
@endsection
