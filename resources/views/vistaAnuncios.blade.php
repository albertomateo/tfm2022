@extends('layouts.app')

@section('content')
<div class="container">
    <p></p>
    <!-- <h1>----------------</h1>  
    {{json_encode(Auth::check())}}
    <h1>----------------</h1> -->

    @auth
    <p>. </p>
    <p> </p>

    <!-- <anuncio-vista :profile="{{Auth::user()}}"></anuncio-vista> -->
    <anuncio-component :user_id="{{json_encode(Auth::check())}}">
        </anuncio-component>
        // The user is authenticated...
        @endauth

        @guest
        <!-- <anuncio-vista :profile="{{Auth::user()}}"></anuncio-vista> -->
        <p>. </p>
        <p> </p>

        <anuncio-component :user_id="{{json_encode(Auth::check())}}">
            </anuncio-component>
            // The user is not authenticated...
            @endguest


</div>
@endsection