@extends('layouts.main')
{{--@yield('title', 'Feed')--}}

@section('content')
<div class="container mt-4">
    <button id='novo-post' class="btn btn-success">Novo Post</button>
    <div class="row">
        <div class="col-md-3">
            <!-- Coluna esquerda para perfil do usuário -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nome do Usuário</h5>
                    <p class="card-text">Informações do perfil e foto</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Coluna central para o feed de notícias -->
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
@endsection
