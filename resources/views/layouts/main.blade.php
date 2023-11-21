@php

    $image = Session::get("user")? Session::get("user")['foto'] : "img/default-photo.png";

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="<?php echo asset('js/jquery-master.js')?>"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('css/global.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    @yield('title')
</head>
<body>
@if(session()->has('error-message'))
    <div id='message-danger' class="alert alert-danger">
        {{session('error-message')}}
    </div>
@endif
@if(session()->has('success-message'))
    <div id='message-success' class="alert alert-success">
        {{session('success-message')}}
    </div>
@endif
<header class="margin-down-small">
    <div class="wrap w90 center items-flex align-center just-space-between">
        <div class="col w30 items-flex align-center">
            <a href="{{ route('inicio') }}" class="logo"><i class="ri-zcool-line"></i></a>
            <form method="get" action="" class="pos-relative items-flex align-baseline margin-left-default hide-device-small">
                @csrf
                @method('get')
                <button type="submit" name="search"><i class="ri-search-line"></i></button>
                <input type="text" name="name" placeholder="Search..." autocomplete="off" class="action-search" />
                @if(isset($_GET['search']))
                    <ul class="search-results box pos-relative">
                        <a class="close action-search"><i class="ri-close-line"></i></a>
{{--                            <?php--}}
{{--                            $query = '';--}}
{{--                            if(isset($_GET['search'])){--}}
{{--                                $name = $_GET['name'];--}}
{{--                                $query = "WHERE name LIKE '$name%'";--}}
{{--                            }--}}
{{--                            $users = DB::select("select * from users $query");--}}
{{--                        foreach ($users as $key => $value){--}}
{{--                            ?>--}}
{{--                        <li class="margin-down-small-in"><a href="{{ route('profile', $value->id) }}">{{ $value->name }}</a></li>--}}
{{--                        <?php } ?>--}}
                    </ul>
                @endif
            </form>
        </div>
        <ul class="col menu w30 items-flex just-center align-center hide-device-small">
            <li><a href="{{ route('inicio') }}"><i class="ri-home-4-line"></i></a></li>
            <li><a href="/musica"><i class="ri-add-circle-line"></i></a></li>
            @if(session()->has('user'))
            <li><a href="{{ route('logout') }}"><i class="ri-logout-circle-line"></i></a></li>
            @endif

            @if(!session()->has('user'))
                <li><a href="{{ route('login') }}"><i class="ri-login-circle-line"></i></a></li>
            @endif
        </ul>
        <ul class="col menu w30 menu items-flex just-center w90-device-small just-end-device-small">
            <li class="user box-effect-user">
                <a href="{{ route('inicio',  Session::get('id')) }}">
                    <figure class="img-user-small margin-right-small items-flex align-center">
{{--                        <img src="{{ url("storage/{$image}") }}" />--}}
                    </figure>
                    <h6>{{ Session::get('name') }}</h6>
                </a>
            </li>
            <li><a href="http://api.whatsapp.com/send?1=pt_BR&phone=55{{ $user->phone_number ?? old('phone_number') }}"><i class="ri-message-3-line"></i></a></li>
            <li><a href="{{ route('inicio') }}"><i class="ri-notification-3-line"></i></a></li>
            <li class="hide-device-bigger"><a href="{{ route('inicio') }}"><i class="ri-group-line"></i></a></li>
            <li class="hide-device-bigger"><a href="{{ route('logout') }}"><i class="ri-add-circle-line"></i></a></li>
            <li class="hide-device-bigger"><a href="{{ route('logout') }}"><i class="ri-user-line"></i></a></li>
        </ul>
    </div>
</header>

@yield('content')

<footer>
    <div class="wrap items-flex align-center just-center">
        <p>@php echo 'Jallim Habbei, '. date("Y") @endphp</p>
    </div>
</footer>
@yield('scripts');
<script src="<?php echo asset('js/layouts/main.js')?>"></script>

</body>
</html>
