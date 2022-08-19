@extends('layouts.app')

@section('content')
<cabeceraportada-component></cabeceraportada-component>
<div class="container-fluid">


    <div class="row mb-3 ">

        <div class="col-md-9 themed-grid-col ">
            <div class="row">
                <div class="col-md-6 themed-grid-col ">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            <portadarentas-component></portadarentas-component>
                        </font>
                    </font>
                </div>
                <div class="col-md-6 themed-grid-col ">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            <portadaeressan-component></portadaeressan-component>
                        </font>
                    </font>
                </div>
                <div class="col-md-6 themed-grid-col ">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            <portadacatastro-component></portadacatastro-component>
                        </font>
                    </font>
                </div>
                <div class="col-md-6 themed-grid-col ">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            <portadadiputacion-component></portadadiputacion-component>
                        </font>
                    </font>
                </div>


            </div>
        </div>
        <div class="col-md-3 themed-grid-col ">

            <anuncio-component :user_id="{{json_encode(Auth::check())}}">
            </anuncio-component>

        </div>

        
    </div>







</div>
<!-- 
<div class="container">
    <div class="card-group mt-3">

        <div class="card text-center border-info">
            <div class="card-body">
                <h4 class="card-title">Titulo de la tarjeta 1</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lectus sem,
                    tempor vitae mattis malesuada, ornare sed erat. Pellentesque nulla dui, congue
                    nec tortor sit amet, maximus mattis dui. </p>
                <a href="#" class="btn btn-primary">Entrar</a>
            </div>
        </div>

        <div class="card text-center border-info">
            <div class="card-body">
                <h4 class="card-title">Unidad de Rentas</h4>

                <portadarentas-component></portadarentas-component>
                <a href="#" class="btn btn-primary">Entrar</a>
            </div>
        </div>

        <div class="card text-center border-info">
            <div class="card-body">
                <h4 class="card-title">Titulo de la tarjeta 3</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lectus sem,
                    tempor vitae mattis malesuada, ornare sed erat. Pellentesque nulla dui, congue
                    nec tortor sit amet, maximus mattis dui. </p>
                <a href="#" class="btn btn-primary">Entrar</a>
            </div>
        </div>

    </div>
</div>



<div class="container">
    <div class="card-group mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Rentas') }}</div>

                        <div class="card-body">
                            <portadarentas-component></portadarentas-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('ERESSAN') }}</div>

                        <div class="card-body">
                            <portadaeressan-component></portadaeressan-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Catastro') }}</div>

                        <div class="card-body">
                            <portadacatastro-component></portadacatastro-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Diputación') }}</div>

                        <div class="card-body">
                            <portadadiputacion-component></portadadiputacion-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection