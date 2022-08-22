@extends('layouts.app')

@section('content')
<div class="container">
<p>.</p>

    <!-- pasamos en usuario autentificado desde la vista blade de laravel 
    hasta el componente vue a traves de las props: -->

    <!-- Aunque innecesaria, mantenemos la doble entrada con directivas auth porque 
    es una indicacion mas de si estamos o no autentificado -->

    @auth
    <topic-component :user_id="{{json_encode(Auth::check())}}">
    </topic-component>
    <p> // user is authenticated...</p>
    @endauth


    
    @guest
    <topic-component :user_id="{{json_encode(Auth::check())}}">
    </topic-component>
    <p> // user is not authenticated...</p>
    @endguest


</div>
@endsection