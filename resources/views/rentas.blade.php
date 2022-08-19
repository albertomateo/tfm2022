@extends('layouts.app');
@section('content')
<h1>RENTAS</h1>




<body>
    
<ul class="navorg">
  <li  class="navorg">><a href="#">Bonificaciones</a></li>
  <li  class="navorg">><a href="#">Recursos</a></li>
  <li  class="navorg">><a href="#">Contactar</a></li>

</ul>

<p><b>Note:</b> Para poder ser asistido correctamente debe ....</p>
<p>Para realizar cualquier tramite debe acceder a la sede electronica del ayuntamiento ....</p>
<p><b>Note:</b> overflow:hidden is added to the ul element to prevent li elements from going outside of the list.</p>

<topicrentas-component></topicrentas-component>

</body>
@endsection
