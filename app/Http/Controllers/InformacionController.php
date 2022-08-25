<?php
// lo usamos solo en un formulario blade , 100% Backend

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //tengo que agregarlo manualmente

class InformacionController extends Controller
{
    const PAGINATE_SIZE = 10;


    protected function validateInformacion($request)
    {
        return Validator::make($request->all(), [
            'informacionTitulo' => ['required', 'string', 'max:20', 'min:2']
        ]);
    }

    public function index(Request $request)   // index para mostrar todos o para filtrar
    {
        $informacionTitulo = null;
        if ($request->has('informacionTitulo')) {
            $informacionTitulo = $request->informacionTitulo;
            $informaciones = Informacion::where('titulo', 'like', '%' . $informacionTitulo . '%')->paginate(self::PAGINATE_SIZE);
        } else {
            $informaciones = Informacion::paginate(self::PAGINATE_SIZE);
        }
        // dd ($informaciones);
        //informaciones = Informacion::paginate(10); // podriamos poner Informacion::all(); para devolver todos los registros
        return view('informaciones.list', ['informaciones' => $informaciones, 'informaciontitulo' => $informacionTitulo]);
    }

    public function create()
    {
        return view('informaciones.create');  // vamos a la vista blade de insercion.
    }

    public function store(Request $request)  // nuevo registro
    {
        $this->validateInformacion($request)->validate();
        $informacion = new Informacion();  // lo crea
        $informacion->seccion = $request->informacionSeccion;  // lena los campos
        $informacion->titulo = $request->informacionTitulo;
        $informacion->contenido = $request->informacionContenido;
        $informacion->save(); // lo guarda
        // redirige a la vista indice con informacion de exito
        return redirect()->route('informaciones.index')->with('success', 'Informacion Creada correctamente');
        // }
    }

    public function edit(Informacion $informacion)
    {
        return view('informaciones.create', ['informacion' => $informacion]);
    }

    public function update(Request $request, Informacion $informacion) // actualiza un registro
    {
        $this->validateInformacion($request)->validate();
        $informacion->seccion = $request->informacionSeccion;
        $informacion->titulo = $request->informacionTitulo;
        $informacion->contenido = $request->informacionContenido;
        $informacion->save();
        return redirect()->route('informaciones.index')->with('success', 'Informacion Actualizada correctamente');
    }

    public function delete(Request $request, Informacion $informacion) // borra un registro
    {
        if ($informacion != null) {
            $informacion->delete();
            return redirect()->route('informaciones.index')->with('success', 'informacion borrada correctamente');
        }
        return redirect()->route('informaciones.index')->with('error', 'error al borrar la informacion');
    }
}
