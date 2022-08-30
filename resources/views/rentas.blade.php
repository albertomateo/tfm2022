@extends('layouts.app')
@section('content')
<h1>RENTAS</h1>

<ul class="navorg">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Bonificaciones </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Recursos </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Exenciones</a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Ayuda</a></li>
  <li class="navorg"><a href="#about">Ayuda</a></li>
</ul <p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>

<topicrentas-component></topicrentas-component>
@include('partials.footer')

@endsection