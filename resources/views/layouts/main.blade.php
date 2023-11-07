<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title', $title) </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <link href='../../css/layouts/main.css' rel="stylesheet">
        <script src='../../js/layouts/main.js'></script>
        <style>

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
    <nav id='main-nav' class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
{{--            <img class="navbar-brand" src="/img/logo-nav.png">--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(session()->has('user'))
                    <li class="nav-item">
                        <img id='profile-photo' src="{{ $user['path'] ? $user['path'] : '../../img/default-photo.png'  }}">{{$user['nome']}}
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
                    @endguest
                    @if(session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link active" id="home" style="color:white" aria-current="page" href="{{route('logout')}}">Logout</a>
                    </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-1 mb-3">
              <li class="nav-item"><a href="/" class="nav-link px-2 text-light">Home</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-light">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; @php echo date('Y') @endphp ProjectGuys, Corp</p>
        </footer>
    </body>
</html>
