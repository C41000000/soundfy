<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href='../../css/layouts/main.css' rel="stylesheet">
        @yield('styles')

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title', $title) </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
{{--        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">--}}
        <script src="https://kit.fontawesome.com/252b052824.js" crossorigin="anonymous"></script>
        <script src='../../js/layouts/main.js'></script>

        <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <meta name="theme-color" content="#712cf9">



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
    <nav id='main-nav' class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
{{--            <img class="navbar-brand" src="/img/logo-nav.png">--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(session()->has('user'))
                    <li class="nav-item">

                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('inicio')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/musica" style="color:white">Musica</a>
                    </li>
                   @if(!session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                    @endif
                    @if(session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('logout')}}">Logout</a>
                    </li>
                    @endif
{{--                    @if(session()->has('user'))--}}
{{--                        <li style="display: flex">--}}
{{--                            <input class='nav-pesquisa' type="text" placeholder="Pesquisar"/>--}}
{{--                            <button class="btn btn-light">Pesquisar</button>--}}

{{--                        </li>--}}
{{--                    @endif--}}
                </ul>
                @if(session()->has('user'))
                {{$user['nome']}} <img id='profile-photo' src="{{ $user['path'] ? $user['path'] : '../../img/default-photo.png'  }}">
                @endif
            </div>
        </div>
    </nav>
    <div class="page-wrapper">
        <div class="page-wrapper-row full-height">
            <div class="page-wrapper-middle">
                <!-- BEGIN CONTAINER -->
                <div class="page-container-fluid">
                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <!-- BEGIN PAGE HEAD-->
                        <div class="page-head">
                            <div class="container-fluid">
                                <!-- BEGIN PAGE TITLE -->
                                <div class="page-title">
                                    <h1>@yield('title')
                                    </h1>
                                </div>
                                <!-- END PAGE TITLE -->
                            </div>
                        </div>
                        <!-- END PAGE HEAD-->
                        <!-- BEGIN PAGE CONTENT BODY -->
                        <div class="page-content">
                            <div style="padding: 2% 10%" class="container-fluid">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
    <script src="../../js/musica/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <footer class="">
            <p  class="text-center text-light py-3">&copy; @php echo date('Y') @endphp ProjectGuys, Corp</p>
        </footer>
    </body>
</html>
