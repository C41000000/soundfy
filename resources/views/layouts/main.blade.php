<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title') </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel='stylesheet' href="https://fonts.googleapis.com/css2?family=Roboto">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

        <script src='../../js/layouts/main.js'></script>
        <style>
            #message-danger, #message-success{
                position: absolute;
                bottom: 0;
                min-width: 100vw;
            }
        </style>
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background: linear-gradient(to bottom, #6d0680, #2a0f57);; color:white">
        <div class="container-fluid">
{{--            <img class="navbar-brand" src="/img/logo-nav.png">--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('inicio')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/musica" style="color:white">Musica</a>
                    </li>
                   @if(!session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('login')}}">login</a>
                    </li>
                    @endguest
                    @if(session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('logout')}}">logout</a>
                    </li>
                    @endguest
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Dropdown--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                            <li><hr class="dropdown-divider"></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>--}}
{{--                    </li>--}}
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
       <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
              <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; @php echo date('Y') @endphp ProjectGuys, Corp</p>
        </footer>
    </div>
    </body>
</html>
