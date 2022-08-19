


@extends('layouts.app')
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">

</header>
<h1>prueba</h1>
<button type="button" class="btn btn-success">Success</button>
@section('content')

<script>
        var botmanWidget = {
            aboutText: 'Write Something',
            introMessage: "✋ Hi! I'm form Real Programmer"
        };
    </script>
   
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<div class="container">
    <p></p>




    @auth

    <anuncio-componentPDF></anuncio-componentPDF>
    <li class="nav-item">
        <a class="nav-link" href="./mantenimientoAnuncios">Mantenimiento de Anuncios</a>
    </li>
    @endauth

    @guest
    <pruebasubida-component></pruebasubida-component>
    <!-- <anuncio-vista></anuncio-vista> -->
    // The user is not authenticated...
@endguest

</div>
@endsection
