@extends('layouts.app')
@section('content')
<h1>TRANSPARENCIA</h1>


<ul class="navorg">
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 1 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 2 </a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank"> opción 3</a></li>
  <li class="navorg"><a href="https://citaprevia.sanlucardebarrameda.es/index.php?seccion=citaPrevia&subSeccion=solicitud" target="_blank">opción 4 </a></li>

</ul>
<p><b>Nota:</b> Escoja la opcion correspondiente o utilice el asistente</p>
<div  id="cuerpo"  class="contaniner sm fluid">

    <a href="../../informaciones/create" class="btn btn-primary">Crear Informacion</a>

    <div class="col-md-6">
        <form action="" method="POST">
            @csrf
            <input id="informacionTitulo" name="informacionTitulo" class="form-control" value="@isset($informacionTitulo) {{ $informacionTitulo }} @endisset" placeholder="Texto a buscar" />
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>



    @if (count($informaciones) > 0)
    <table class="table table-bordered table-hover table-xl">
        <thead class="thead-light">

            <th>id</th>
            <th>seccion</th>
            <th>titulo</th>
            <th>contenido</th>
        </thead>

        <tbody>
            @foreach ($informaciones as $informacion)
            <tr>
                <td>{{ $informacion->id }}</td>

                <td>{{ $informacion->seccion }}</td>

                <td>{{ $informacion->titulo }}</td>
                <td>{{ $informacion->contenido }}</td>

                @auth
                <td>
                    <a href="{{ route('informaciones.edit', $informacion) }}" class="btn btn-success btn-sm">
                        editar
                    </a>

                    <form id="delete-form-{{ $informacion->id }}" action="{{ route('informaciones.delete', [$informacion]) }}" method="post" style="display: inline-block;">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick=" document.getElementById('delete-form-{{ $informacion->id }}').submit()">
                            borrar
                        </a>

                    </form>

                </td>
                @endauth
            </tr>
            @endforeach

        </tbody>

    </table>



    <div class="container-fluid h-100">
        <div class="row w-100 align-items-center">
            <div class="col text-center">
                <a href="{{ url('/') }}" class="btn btn-info regular-button">Home</a>


            </div>
        </div>
    </div>



    @else

    <div class="alert alert-warning" role="alert">
        Aun no existen Informaciones.
    </div>
    @endif
    {{ $informaciones->links() }}
    @endsection

</div>