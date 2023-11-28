@extends('layouts.main')
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line boxless tabbable-reversed">
                    <div class="tab-pane active">
                        <div class="portlet box green">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <form id="formCadastroMusica" role="form" method="POST" action="/musica/store"
                                          target="_blank">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id_musica" value="{{isset($musica) && $musica->id_musica ? $musica->id_musica : null}}">
                                        <div
                                            class="w100 items-flex align-center center w100-device-small flex-wrap-device-small">
                                            <div class="w100">
                                                <label>Genero da Música</label>
                                                <select name='id_genero' class="bgBlackWeakIn margin-down-small w100">
                                                    <option value="">Selecione</option>
                                                    @foreach($generos as $genero)
                                                        <option {{isset($musica) && $musica->id_genero == $genero->id_genero ? 'selected' : ''}} value="{{$genero->id_genero}}">{{$genero->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="w100">
                                                <label>Titulo da Música</label>
                                                <input type="text" class="bgBlackWeakIn margin-down-small w100"
                                                       placeholder="Titulo da Música" name="titulo" id="titulo" value="{{isset($musica) && $musica->titulo ? $musica->titulo : null}}">
                                            </div>
                                        </div>
                                        <div
                                            class="w100 items-flex align-center center w100-device-small flex-wrap-device-small">
                                            <div class="w100">
                                                <label>Faixa MP3</label>
                                                <input type="file" class="bgBlackWeakIn margin-down-small w100"
                                                       placeholder="Faixa" name="faixa" id="faixa" {{ isset($musica) ? 'disabled' : ''}}>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-actions text-center">
                                    @if(isset($musica) && $musica)
                                        <button onsubmit type="button" class="bgBlackWeakIn w80 center editar">
                                            Salvar
                                        </button>
                                    @endif
                                    <button onsubmit type="button" class="bgBlackWeakIn w80 center cadastro">
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

        $('.editar').on('click', function () {
            let id = $('input[name="id_musica"]').val();
            let dados = $("#formCadastroMusica").serializeArray();
            $.ajax({
                url: `/musica/salvar/${id}`,
                type: 'POST',
                data: dados,
                success: function (data) {

                },
                error: function (data) {

                }
            });
        });

    </script>
@endsection
