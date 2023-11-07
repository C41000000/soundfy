@extends('layouts.main')
@section('styles')
<link href="../../css/feed-atividades/index.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="../../js/feed-atividades/index.js"></script>
@endsection

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-3">
            @if(session()->has('user'))
            <!-- Coluna esquerda para perfil do usuário -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$user['nome']}}</h5>
                    <p class="card-text">Informações do perfil e foto</p>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <!-- Coluna central para o feed de notícias -->
{{--            @if(session()->has('user'))--}}
{{--            <div class="card">--}}
{{--                <div class="card-body" >--}}
{{--                   <img id='post-photo' src="{{ $user['path'] ? $user['path'] : '../../img/default-photo.png'  }}">--}}
{{--                    <input id='new-post' type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#staticBackdrop" placeholder="O que está havendo?">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endif--}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Novo Post</h5>
                    <p class="card-text">Conteúdo do seu post.</p>
                    <a href="#" class="card-link">Curtir</a>
                    <a href="#" class="card-link">Comentar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!-- Coluna direita para anúncios ou outras informações -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Anúncios</h5>
                    <p class="card-text">Anúncios patrocinados ou outras informações.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
{{--<div class="modal modal-lg fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--  <div class="modal-dialog">--}}
{{--    <div class="modal-content">--}}
{{--      <div class="modal-header">--}}
{{--        <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel">Novo Post</h1>--}}
{{--        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--      </div>--}}
{{--      <div class="modal-body">--}}
{{--          <form>--}}
{{--                <div class="mb-3 col-4">--}}
{{--                    <label for="titulo" class="form-label">Título</label>--}}
{{--                    <input type="text" class="form-control" id="titulo" >--}}
{{--                </div>--}}
{{--              <div class="mb-3 col-4">--}}
{{--                  <label for="artista" class="form-label">Gênero</label>--}}
{{--              </div>--}}
{{--                <input type="file" style="display: none" name="musica" id="musica">--}}
{{--                <label id="song-upload" class="btn btn-success" for="musica"><i class="fa-solid fa-upload" ></i></label>--}}
{{--            </form>--}}
{{--      </div>--}}
{{--      <div class="modal-footer">--}}
{{--        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>--}}
{{--        <button type="button" class="btn btn-primary">Confirmar</button>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}


@endsection
