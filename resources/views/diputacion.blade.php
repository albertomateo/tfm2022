@extends('layouts.app')
@section('content')
<h1>DIPUTACION</h1>
<ul class="navorg">
  <li class="navorg"><a href="https://sprygt.dipucadiz.es/" target="_blank">Domiciliaciones</a></li>
  <li class="navorg"><a href="https://sprygt.dipucadiz.es/" target="_blank">Pago de Recibos</a></li>
  <li class="navorg"><a href="https://sprygt.dipucadiz.es/" target="_blank">Embargos</a></li>
  <li class="navorg"><a href="https://sprygt.dipucadiz.es/" target="_blank">Registro</a></li>
  <li class="navorg"><a href="#about">Ayuda</a></li>
</ul>

<p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>

<topicdiputacion-component></topicdiputacion-component>


@endsection