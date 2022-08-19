@extends('layouts.app')

@section('content')
<div class="container">
    <p></p>

    @auth
    <p>. </p>
    <p> </p>


    <enlace-component :user_id="{{json_encode(Auth::check())}}">
        </enlace-component>
        // The user is authenticated...
        @endauth

        @guest

        <p>. </p>
        <p> </p>

        <enlace-component :user_id="{{json_encode(Auth::check())}}">
            </enlace-component>
            // The user is not authenticated...
            @endguest


</div>
@endsection