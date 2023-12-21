<!doctype html>
<html lang="es">
<head>
    <meta name="viewport" content="initial-scale=1.0">
	<meta charset="utf-8">
    <title>CATE ET N°8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script><link rel="icon" href="{!! asset('cate.ico') !!}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/e1bfb7b0a2.js" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}">

</head>

<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h2>Centro de Acompañamiento a las Trayectorias Escolares</h2>
        </div>
    </div>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fa-solid fa-user" style="color: #abb8cf;"></i>
                                </a>
                                <div class="flex-shrink-0 dropdown" aria-labelledby="navbarDropdown">
                                    <ul class="dropdown-menu text-small shadow">
                                        <li><a class="dropdown-item" href="#">Mis datos</a></li>
                                        <li><a class="dropdown-item" href="{{route("docentes.index")}}">Docentes</a></li>
                                        <li><a class="dropdown-item" href="{{route("estudiantes.index")}}">Estudiantes</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesión') }}
                                        </a>
                                    </ul>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
</header>

<body>

    <div class="container">
        <div class="card" style="margin-top: 20px;">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>
    
    </body>
    
    <div class="container">
        <footer class="py-3 my-4">
            @guest
            @if (Route::has('register'))
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a class="nav-link px-2 text-muted" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
            </ul>
            @endif
            @else
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Mis Datos</a></li>
                <li class="nav-item"><a href="{{route("docentes.index")}}" class="nav-link px-2 text-muted">Docentes</a></li>
                <li class="nav-item"><a href="{{route("estudiantes.index")}}" class="nav-link px-2 text-muted">Estudiantes</a></li>
            </ul>
            @endguest
            <p class="text-center text-muted">&copy; 2023 - CATE ET8</p>
        </footer>
    </div>
    
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>
