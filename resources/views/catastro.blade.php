@extends('layouts.app');
@section('content')
<h1>CATASTRO</h1>




<body>
    
<ul class="navorg">
  <li  class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">Declaraciones Catastrales 900D       </a></li>
  <li  class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">      Alegaciones o Recursos contra Catastro  </a></li>
  <li  class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">      Requerimientos y Audiencias de Catastro</a></li>
  <li  class="navorg"><a href="#about">Ayuda</a></li>
</ul>

<p><b>Note:</b> If a !DOCTYPE is not specified, floating items can produce unexpected results.</p>
<p>A background color is added to the links to show the link area. The whole link area is clickable, not just the text.</p>
<p><b>Note:</b> overflow:hidden is added to the ul element to prevent li elements from going outside of the list.</p>

<TopicCatastro-component></TopicCatastro-component>

</body>
@endsection
