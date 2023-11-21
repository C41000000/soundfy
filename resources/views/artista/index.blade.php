@extends('layouts.main')

@section('content')

    <main class="container-profile margin-down-default">
        <div class="wrap w80 center w95-device-small">
            <div class="item-profile">
                <div class="banner items-flex align-end">
                    <div class="row w100 items-flex align-center flex-wrap">
                        <figure class="img-profile w15 margin-right-default">
                            <img src="{{ url($user->foto->caminho) }}" />
                        </figure>
                        <div class="col w60-device-small">
                            <h3>{{ $user->nome }}</h3>
                            <p>{{ $user->descricao }}</p>
                        </div>
                        <div class="col col-infos w100 items-flex just-end w95-device-small flex-wrap-device-small" style="margin-top: 5%!important;">
                            <ul class="menu w65 items-flex w100-device-small">
                                <li class="tab tabs--active"><a>Feed</a></li>
                                <li class="tab"><a>Sobre</a></li>
{{--                                <li class="tab"><a>Profissão</a></li>--}}
                            </ul>
                            <ul class="buttons w20 items-flex align-center just-end w100-device-small">
                                @if(Session::get('user'))
                                <li class="margin-right-small"><a href="{{ route('editar-usuario', $user->usr_id) }}" class="button bgBlackWeak"><i class="ri-settings-2-line"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="container-infos-profile items-flex just-space-between w80 center flex-wrap-device-small w100-device-small">

        <section class="w25 w95-device-small container-order center-device-small">
            <div class="wrap">
                <div class="box">
                    <div class="title margin-down-small">
                        <h4>Ultimos Posts</h4>
                    </div>
                    <ul class="list margin-down-small">

                        @foreach ($posts as $post)
                            @include('components.content-post')
                        @endforeach
                    </ul>
                    <ul class="list-infos-profile">
{{--                        @foreach ($ProfessionalProfile as $ProfessionalProfile)--}}
{{--                            @if($ProfessionalProfile->user_id == $user->id)--}}
{{--                                <li class="margin-down-small items-flex align-center">--}}
{{--                                    <h5>{{ $ProfessionalProfile->name_company }}</h5>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            </div>
        </section>

        <section class="w70 w95-device-small margin-down-default-device-small center-device-small">

            @if(Session::get('email') == $user->email)
                <section class="container-form margin-down-small">
                    <div class="row items-flex">
                        <figure class="img-user-default margin-right-small items-flex align-baseline">
                            <img src="{{ url("{$image}") }}" />
                        </figure>
                        <form class="new-post w100 pos-relative" method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" placeholder="New post" class="w100" />
                            <textarea class="text-content hide" name="content" placeholder="Hello World"></textarea>
                            <div class="buttons items-flex">
                                <a class="button toggle"><i class="ri-text"></i></a>
                                <input type="file" name="image" id="image" style="display:none" />
                                <label for="image" class="button"><i class="ri-image-add-line"></i></label>
                                <button type="submit"><i class="ri-send-plane-line"></i></button>
                                <input type="hidden" name="user" value="{{ Session::get('email'); }}" />
                            </div>
                        </form>
                    </div>
                </section>
            @endif

            <section class="content content--active">
{{--                <?php--}}
{{--                foreach ($posts as $post){--}}
{{--                    $user_find = $user->email;--}}
{{--                    $user = DB::select('select * from users where email = :email', ['email' => $user_find]);--}}
{{--                    $user = $user[0];--}}
{{--                if($post->user === $user_find){--}}
{{--                    ?>--}}
{{--                @include('components.content-post')--}}
{{--                <?php }} ?>--}}
            </section>

            <section class="content">
                <div class="box">
                    <p>{{ $user->about }}</p>
                </div>
            </section>

            <section class="content">
                <div class="box">
                    <p>{{ $user->title_user }}</p>
                </div>
            </section>


        </section>


    </section>

@endsection


