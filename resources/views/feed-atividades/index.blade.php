@extends('layouts.main')

@php

    $image = Session::get("user")? Session::get("user")['foto'] : "img/default-photo.png";
//    dd( Session::get("user"));
@endphp

@section('content')

    <main class="items-flex w90 center just-space-between w95-device-small">

        <section class="container-menu w20 w100-device-small container-order">
            <div class="wrap items-flex just-space-between">
                <div
                    id='div-foto'
                    class="row w100"

                    href="@if(Session::get('user')){{route('perfil', ['id' => Session::get('user')['usr_id']])}}@endif"
                >
                    <div class="item text-center margin-down-small">
                        <figure class="box-banner margin-down-small-in">
                            <img src="{{ $image }}" />
                        </figure>
                        <h6>Seja bem vindo(a)
                            @php
                                if(session()->has('user'))
                                    echo Session::get('user')['nome'];
                            @endphp
                        </h6>
                    </div>
                    <div class="item margin-down-small" style="color: white">
                        @if(session()->has('user'))
                            {{Session::get('user')['descricao']}}
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="container w50 w100-device-small">
            <div class="wrap">

                <section class="margin-down-default">
                    <div class="title margin-down-small">
                        <h3>Novos usuários</h3>
                    </div>
                    <div class="slide">
                        <ul class="storys items-flex">
                            @foreach ($lastUsers as $user)
                                <li>
                                    <a href="{{ route('perfil', $user->usr_id) }}" class="text-center">
                                        <figure>
                                            <img src="{{ url("{$user->foto}") }}" class="bgBlackWeakIn" />
                                        </figure>
                                        <h6>{{ $user->nome }}</h6>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <section class="margin-down-small">
                    <h3>Atividades</h3>
                </section>

                <section class="container-form margin-down-small">
                    <div class="row items-flex">
{{--                        <figure class="img-user-default margin-right-small items-flex align-baseline">--}}
{{--                            <img src="{{ url("{$image}") }}" />--}}
{{--                        </figure>--}}
{{--                        <form class="new-post w100 pos-relative" method="post" action="{{ route('store') }}" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="text" name="title" placeholder="New post" class="w100" />--}}
{{--                            <textarea class="text-content hide" name="content" placeholder="Hello World"></textarea>--}}
{{--                            <div class="buttons items-flex">--}}
{{--                                <a class="button toggle"><i class="ri-text"></i></a>--}}
{{--                                <input type="file" name="image" id="image" style="display:none" />--}}
{{--                                <label for="image" class="button"><i class="ri-image-add-line"></i></label>--}}
{{--                                <button type="submit"><i class="ri-send-plane-line"></i></button>--}}
{{--                                <input type="hidden" name="user" value="{{ Session::get('email'); }}" />--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </section>

                <section class="items">
                    @foreach($posts as $post)
                        @include('components.content-post')
                    @endforeach

                </section>

            </div>
        </section>

        <section class="container w20 w100-device-small">
            <div class="wrap">

                <section class="notifications margin-down-default">
                    <div class="wrap">
                        <div class="box">
                            <p>NOTIFICAÇÕES</p>
{{--                            <?php--}}
{{--                            foreach($friendsRequests as $friendRequest) {--}}
{{--                            foreach($users as $user){--}}
{{--                            if($friendRequest->user_to == $user->id){--}}
{{--                            if($friendRequest->user_from != Session::get('id')){--}}
{{--                            if($friendRequest->status != 'approved' && $friendRequest->status != 'reject'){--}}
{{--                                $user = DB::select('select * from users where id = :id', ['id' => $friendRequest->user_from]);--}}
{{--                                $user = $user[0];--}}
{{--                                ?>--}}
{{--                            <div class="items-flex margin-top-small align-center">--}}
{{--                                <figure class="img-user-small margin-right-small items-flex align-center">--}}
{{--                                    <img src="{{ url("storage/{$user->image}") }}" />--}}
{{--                                </figure>--}}
{{--                                <h6>{{ $user->name }} asked to be your friend</h6>--}}
{{--                            </div>--}}
{{--                            <?php }}}}} ?>--}}
                            <?php ?>
{{--                            foreach($posts as $post) {--}}
{{--                            if($post->created_at >= date('Y-m-d')){--}}
{{--                                ?>--}}
{{--                            <div class="items-flex margin-top-small align-center">--}}
{{--                                <figure class="img-user-small margin-right-small items-flex align-center">--}}
{{--                                    <img src="{{ url("storage/{$post->image}") }}" />--}}
{{--                                </figure>--}}
{{--                                <h6>New post: {{ $post->title }}</h6>--}}
{{--                            </div>--}}
{{--                            <?php }} ?>--}}
                        </div>
                    </div>
                </section>

                <section class="users">
                    <div class="wrap">
                        <p>Meus Projetos Musicais</p>
                        <ul class="margin-top-small">
{{--                            <?php--}}
{{--                            foreach ($friendsRequests as $friendRequest) {--}}
{{--                            foreach($users as $user){--}}
{{--                            if($friendRequest->user_from == $user->id){--}}
{{--                            if($friendRequest->status == 'approved'){--}}
{{--                                $user = DB::select('select * from users where id = :id', ['id' => $friendRequest->user_from]);--}}
{{--                                $user = $user[0];--}}
{{--                                ?>--}}
{{--                            <li class="items-flex align-center margin-down-small">--}}
{{--                                <figure class="img-user-default margin-right-small items-flex align-center">--}}
{{--                                    <img src="{{ url("storage/{$user->image}") }}" />--}}
{{--                                </figure>--}}
{{--                                <h6>{{ $user->name }}</h6>--}}
{{--                            </li>--}}
{{--                            <?php }}}} ?>--}}
                        </ul>
                    </div>
                </section>

            </div>
        </section>
    </main>

    <script src="<?php echo asset('js/feed-atividades/index.js')?>"></script>
@endsection
