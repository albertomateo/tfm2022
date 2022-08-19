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

    <!-- <topic-vista :profile="{{Auth::user()}}"></topic-vista> -->
    <topic-component :user_id="{{json_encode(Auth::check())}}">
        </component-vista>
        // The user is authenticated...
        @endauth

        @guest
        <!-- <topic-vista :profile="{{Auth::user()}}"></topic-vista> -->
        <p>. </p>
        <p> </p>

        <topic-component :user_id="{{json_encode(Auth::check())}}">
            </component-vista>
            // The user is not authenticated...
            @endguest


</div>
@endsection