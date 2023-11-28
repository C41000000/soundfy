@extends('layouts.main')

@section('title', 'Criar Projeto')

@section('content')
    <main class="settings-container">
        <div class="wrap w80 center margin-down-default w95-device-small">
            <form method="post" name="basico" id="basico" action="{{ route('criar-projeto') }}" enctype="multipart/form-data" class="box">
                @csrf
                <div class="w70 items-flex align-center center w100-device-small flex-wrap-device-small">
                    <div class="w50 w100-device-small margin-down-small-device-small">
                        <input type="text" name="nome" value="" class="bgBlackWeakIn margin-down-small w80" placeholder="Nome do projeto"/>
                        <input type="text" name="descricao" value="" class="bgBlackWeakIn margin-down-small w80" placeholder="Descrição do projeto" />
                    </div>
                    <div class="text-center w100-device-small">
                        <div class="img-user-bigger margin-left-default margin-down-small" style="display: flex; flex-direction: column;justify-content: center;gap:10px">
                            <label for="artistas">Artistas</label>
                            <select class="js-example-basic-multiple" multiple="multiple" id="artistas" name="artistas[]" style="">
                                <option value="">Selecione</option>
                                @if($users->first())
                                    @foreach($users as $cada_user)
                                        <option value="{{$cada_user->usr_id}}">{{$cada_user->nome}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="img-user-bigger margin-left-default margin-down-small" style="display: flex; flex-direction: column;justify-content: center;gap:10px">
                            <label for="musicas">Músicas</label>
                            <select class="js-example-basic-multiple" multiple="multiple" id="musicas" name="musicas[]" style="">
                                <option value="">Selecione</option>
                                @if($musicas->first())
                                    @foreach($musicas as $cada_musica)
                                        <option value="{{$cada_musica->id_musica}}">{{$cada_musica->titulo}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button id="button-basico" class="bgBlackWeakIn w80 center">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @section('scripts')
        <script src="<?php echo asset('js/projeto-musical/create.js')?>"></script>
    @endsection
@endsection


