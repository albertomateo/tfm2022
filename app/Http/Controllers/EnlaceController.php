<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enlace;

class EnlaceController extends Controller
{
    // devuelve array de objetos con el campo a filtrar. Es un parametro opcional
    public function filtrar($textoafiltrar = '%')
    {
        if (isset($textoafiltrar)) { // si el parametro no esta vacio filtra
            return Enlace::where('titulo', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('sitioweb', 'like', '%' . $textoafiltrar . '%')->get();
        } else { // si no 
            return Enlace::all();
        }
        if (is_null($textoafiltrar)) {
            return Enlace::all();
        }
        if (empty($textoafiltrar)) {
            return Enlace::all();
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Enlace::get();
    }
    // esto prodria hacerse para utilizar el metodo index para filtrar
    //    public function index(Request $request) 
    //    {
    //         $enlacename=null;
    //         if ($request->has('enlacename')){
    //             $enlacename=$request->enlacename;
    //             $enlaces=Enlace::where('name','like','%'.$enlacename.'%');
    //         } else {
    //             $enlaces=Enlace::get();
    //         }
    //    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo ("no usado create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  // crea y graba un nuevo registro
    {
        try {
            // dd($request);
            $enlace = new Enlace();
            $enlace->titulo = $request->titulo;
            $enlace->sitioweb = $request->sitioweb;

            $enlace->save();

            return response()->json(['message' => 'Registro creado '], 200); //creacion correcta

        } catch (\Exception $e) {  // si hay error lo devuelve en el mensaje
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Enlace $enlace) // muestra un elemento del array de objetos recibido
    {
        return $enlace;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  echo no usado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)   // Para Actualizar Registros
    {
        try {
            $enlace = Enlace::find($request->id);  // busca el objeto con ese id
            // Getting values from  form

            $enlace->titulo = $request->titulo;   // uno a uno actualiza los campos
            $enlace->sitioweb = $request->sitioweb;
            $enlace->save();                      // graba
            return response()->json(['message' => 'Registro guardado '], 200); //creacion correcta

        } catch (\Exception $e) {  // si hay error lo devuelve en el mensaje
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enlace $enlace)  // a veces se usa delete
    {
        $enlace->delete();
    }
}
