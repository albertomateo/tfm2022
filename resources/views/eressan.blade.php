@extends('layouts.app')
@section('content')
<h1>ERESSAN</h1>
<ul class="navorg">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Liquidaciones en Voluntaria - Pagos </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Liquidaciones en Voluntaria - Fraccionamientos </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Pago alquiler de Viviendas</a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Pago ayuda a Domicilio</a></li>
  <li class="navorg"><a href="#about">Ayuda</a></li>
</ul>
<!-- <br style="clear:both"/> -->
<p style="clear:both"><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>

<topicEressan-component></topicEressan-component>

@endsection