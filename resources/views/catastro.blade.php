@extends('layouts.app')
@section('content')
<h1>CATASTRO</h1>

<ul class="navorg">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Declaraciones Catastrales 900D </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> Alegaciones o Recursos contra Catastro </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> Requerimientos y Audiencias de Catastro</a></li>
  <li class="navorg"><a href="#about">Ayuda</a></li>
</ul>
<p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>

<TopicCatastro-component></TopicCatastro-component>
@include('partials.footer')


@endsection