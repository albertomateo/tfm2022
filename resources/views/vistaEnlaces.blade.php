@extends('layouts.app')

@section('content')


    <h1>ENLACES</h1>
    <ul class="navorg">
        <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 1 </a></li>
        <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 2 </a></li>
        <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 3</a></li>
        <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 4 </a></li>

    </ul>
    <p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>

    <div class="container">
    <!-- pasamos en usuario autentificado desde la vista blade de laravel 
    hasta el componente vue a traves de las props: -->

    <!-- Aunque innecesaria, mantenemos la doble entrada con directivas auth porque 
    es una indicacion mas de si estamos o no autentificado -->

    @auth
    <enlace-component :user_id="{{json_encode(Auth::check())}}">
    </enlace-component>
    <p> // user is authenticated...</p>
    @endauth



    @guest
    <enlace-component :user_id="{{json_encode(Auth::check())}}">
    </enlace-component>
    <p> // user is not authenticated...</p>
    @endguest

    @include('partials.footer')
</div>
@endsection