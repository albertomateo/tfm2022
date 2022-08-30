@extends('layouts.app')
@section('content')



@auth

<div class="card-body">
@isset($informacion)
<form name="edit_informacion" action="{{ route('informaciones.update',$informacion) }}" method="POST">
    @csrf
@else
<form name="create_informacion" action="{{ route('informaciones.store') }}" method="POST">
    @csrf
@endisset


    <div class="col-12">
        <form name="create_informacion" action="{{ route('informaciones.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="informacionSeccion" class="form-label"> Titulo </label>
                <input id="informacionSeccion" name="informacionSeccion" type="text"
                    placeholder="Introduce el nombre de la Seccion" class="form-control" required
                    @isset($informacion) value="{{ old('informacionSeccion', $informacion->seccion) }}"
                    @else value="{{ old('informacionSeccion')}}"
                    @endisset
                    />
                <input id="informacionTitulo" name="informacionTitulo" type="text"
                    placeholder="Introduce el nombre del titulo" class="form-control" required
                    @isset($informacion) value="{{ old('informacionTitulo', $informacion->titulo) }}"
                    @else value="{{ old('informacionTitulo')}}"
                    @endisset
                    />
                    <input id="informacionContenido" name="informacionContenido" type="text"
                    placeholder="Introduce el nombre del contenido" class="form-control" required
                    @isset($informacion) value="{{ old('informacionContenido', $informacion->contenido) }}"
                    @else value="{{ old('informacionContenido')}}"
                    @endisset
                    />
                
            </div>
            <input type="submit" value="@isset($informacion) Actualizar @else Crear @endisset" class=" btn btn-primary" name="createBtn" />
        </form>
    </div>
</div>
@endauth
@include('partials.footer')
@endsection
