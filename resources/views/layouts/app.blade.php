<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Estilos incorporados manualmente -->

    <meta name="viewport"  content="width=device-width, initial-scale=1"/> <!-- Necesario para pantalla pequeña de movil -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilosproyecto.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav id="cabece" class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top" >
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./eressan">Eressan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./catastro">Catastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./rentas">Unidad de Rentas Ayuntamiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./diputacion">Diputación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./vistabotman">Asistente Virtual</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./vistaAnuncios">Anuncios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./vistaTopics">Temas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./galeria">Galeria de Fotos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./informaciones">Inf.Transparencia</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./vistaEnlaces">Enlaces de Interes</a>
                        </li>

                        
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./comollegar"><img src="/images/Antu_google-maps_svg_32.png" style="width:32px; height:32px"></img></a>
                        </li>

                        

                    </ul>
                    <!-- <ul class="nav col-md-4 justify-content-end">
                        

                    </ul> -->


                    <!-- Right Side Of Navbar -->
                    @auth

                    <span class="p-1 mb-2 bg-danger text-white">Conectado como:{{ Auth::user()->name }}</span>

                    @endauth
                    @guest
                    <span class="p-1 mb-1 bg-primary text-white">Público General</span>
                    @endguest


                    <ul class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">General</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./vistaAnuncios">Anuncios</a></li>
                            <li><a class="dropdown-item" href="#">Consejos Generales</a></li>
                            <li><a class="dropdown-item" href="#">Preguntas Frecuentes</a></li>
                            <li><a class="dropdown-item" href="#">Direcciones y Telefonos</a></li>
                            <li><a class="dropdown-item" href="#">Galeria de Fotos Actuales</a></li>
                            <li><a class="dropdown-item" href="#">Galeria de Fotos Antiguas</a></li>
                            <li><a class="dropdown-item" href="#">Legislación</a></li>

                            <li></li>
                            @guest

                            <!-- No autentificado -->
                            <!-- login -->
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            <!-- Registro -->
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @endguest

                            @auth
                            <li class="nav-item">

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>


                            @endauth







                            </li>
                        </ul>
                    </ul>

                </div>

            </div>
        </nav>

        <main class="py-4">
            @include('partials.alerts')
            @yield('content')



            
        </main>


        <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 my-2 border-top">
            <p class="col-md-4 mb-0">© 2022 TFM</p>

            <!-- <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a> -->

            <ul class="nav col-md-10 justify-content-center">
            <li class="nav-item"><a href="./" class="nav-link text-muted">INICIO</a></li>
            <li class="nav-item"><a href="./vistabotman" class="nav-link text-muted">AYUDA</a></li>
                        <li class="nav-item"><a href="./" class="nav-link text-muted">MAPA WEB</a></li>
                <li class="nav-item"><a href="./" class="nav-link ptext-muted">ACCESIBILIDAD WEB</a></li>
                <li class="nav-item"><a href="./vistabotman" class="nav-link text-muted">AVISO LEGAL</a></li>
                <li class="nav-item"><a href="./vistabotman" class="nav-link  text-muted">POLITICA DE COOKIES</a></li>



            </ul>
        </footer>

    </div>




</body>

</html>