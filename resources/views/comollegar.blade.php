@extends('layouts.app')
@section('content')
<h1>COMO LLEGAR</h1>


<ul class="navorg">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 1 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 2 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 3</a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 4 </a></li>

</ul>
<p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>


<!-- pasamos en usuario autentificado desde la vista blade de laravel 
    hasta el componente vue a traves de las props: -->

<!-- Aunque innecesaria, mantenemos la doble entrada con directivas auth porque 
    es una indicacion mas de si estamos o no autentificado -->
<div class="container">
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3195.6109473038528!2d-6.3568133847106845!3d36.77989967995281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0ddf4f80be0339%3A0x5c971d769d2ea0dd!2sERESSAN%20-%20Empresa%20Municipal%20de%20Recaudaci%C3%B3n%20y%20Servicios%20S.A.!5e0!3m2!1ses!2ses!4v1659514339327!5m2!1ses!2ses"
    width="800" height="1000" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
@include('partials.footer')
@endsection