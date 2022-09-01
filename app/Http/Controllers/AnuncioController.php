<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use Illuminate\Auth\Events\Validated;

class AnuncioController extends Controller
{
    // devuelve array de objetos con el campo a filtrar. Es un parametro opcional
    public function filtrar($textoafiltrar = '%')
    {
        //quitamos los caracteres peligrosos
        // $textoafiltrar = 'Te@x+t(*o# M*//a$li&)c--i::os/o';
        $pattern = '/\@|\.|\;|\"|\<|\>|\#|\&|\$|\/|\:|\*|\(|\)|\+|\-|\%/i';
        $textoafiltrar= preg_replace($pattern, '', $textoafiltrar);
       

        if (isset($textoafiltrar)) { // si el parametro no esta vacio filtra
            return Anuncio::where('titulo', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('descripcion', 'like', '%' . $textoafiltrar . '%')->get();
        } else { // si no 
            return Anuncio::all();
        }
        if (is_null($textoafiltrar)) {
            return Anuncio::all();
        }
        if (empty($textoafiltrar)) {
            return Anuncio::all();
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()                //devuelve todos
    {
        return Anuncio::get();
    }

    // esto prodria hacerse para utilizar el metodo index para filtrar
    //    public function index(Request $request) 
    //    {
    //         $anuncioname=null;
    //         if ($request->has('anuncioname')){
    //             $anuncioname=$request->anuncioname;
    //             $anuncios=Anuncio::where('name','like','%'.$anuncioname.'%');
    //         } else {
    //             $anuncios=Anuncio::get();
    //         }
    //    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo ("no usado create");
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     // crea y graba un nuevo registro
    {
        try {
            // dd($request);
            $anuncio = new Anuncio();
            $anuncio->titulo = $request->titulo;
            $anuncio->descripcion = $request->descripcion;
            $anuncio->enlace = $request->enlace;
            
            if ($request->hasFile('documento_nuevo')) {   // si tiene un archivo adjunto lo mueve a carpeta
                $archivo = $request->file('documento_nuevo');
                $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
                $anuncio->documento = $archivo->getClientOriginalName();  // pone en el campo el nombre del archivo
            }

            $anuncio->save();
           
            return response()->json(['message' => 'Registro creado y Archivo subido '], 200); // si es correcto lo devuelve en mensaje

        } catch (\Exception $e) { // si hay error lo devuelve en el mensaje
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)  // muestra un elemento del array de objetos recibido
    {
        return $anuncio;
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
    public function update(Request $request)      // Para Actualizar Registros 
    {
        $anuncio = Anuncio::find($request->id);   // busca el objeto con ese id
        // Getting values from the  form
        $anuncio->titulo =  $request->titulo;     // uno a uno actualiza los campos
        $anuncio->descripcion = $request->descripcion;
        $anuncio->enlace = $request->enlace;
        $anuncio->documento = $request->documento;
        if ($request->hasFile('documento_nuevo')) {  // Si se adjunta archivo se copia y se actualiza campo

            $archivo = $request->file('pdf');
            $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
            $anuncio->documento = $archivo->getClientOriginalName();
        }

        $anuncio->save();  //graba
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)   // a veces se usa delete en vez de destroy
    {
        $anuncio->delete();
    }
}
