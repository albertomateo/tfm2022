<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    // devuelve array de objetos con el campo a filtrar. Es un parametro opcional
    public function filtrar($textoafiltrar = '%')
    {
        if (isset($textoafiltrar)) {  // si el parametro no esta vacio filtra
            return Topic::where('tema', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('detalle', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('observaciones', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('organismo', 'like', '%' . $textoafiltrar . '%')->get();
        } else { // si no 
            return Topic::all();
        }
        if (is_null($textoafiltrar)) {
            return Topic::all();
        }
        if (empty($textoafiltrar)) {
            return Topic::all();
        }
    }

    //--------------------------------


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()                       //devuelve todos
    {
        return Topic::get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo ("no usado create");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)      // crea y graba un nuevo registro
    {
        try {
            // dd($request);
            $topic = new Topic();
            $topic->organismo = $request->organismo;
            $topic->tema = $request->tema;
            $topic->detalle = $request->detalle;
            $topic->observaciones = $request->observaciones;
            $topic->enlace = $request->enlace;
            $topic->orden = $request->orden;
            $topic->destacado = $request->destacado;

            if ($request->hasFile('documento_nuevo')) {     // si tiene un archivo adjunto lo mueve a carpeta
                $archivo = $request->file('documento_nuevo');
                $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
                $topic->documento = $archivo->getClientOriginalName();  // pone en el campo el nombre del archivo
            }

            $topic->save();

            return response()->json(['message' => 'Registro creado y Archivo subido '], 200);  // si es correcto lo devuelve en mensaje

        } catch (\Exception $e) {  // si hay error lo devuelve en el mensaje
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
    public function show(Topic $topic)  // muestra un objeto recibido
    {
        return $topic;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo no usado
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)              // Para Actualizar Registros 
    {
        $topic = Topic::find($request->id);               // busca el objeto con ese id
        // Getting values from the  form
        $topic->organismo = $request->organismo;          // uno a uno actualiza los campos
        $topic->tema = $request->tema;
        $topic->detalle = $request->detalle;
        $topic->observaciones = $request->observaciones;
        $topic->enlace = $request->enlace;
        $topic->orden = $request->orden;
        $topic->destacado = $request->destacado;

        if ($request->hasFile('documento_nuevo')) {         // Si se adjunta archivo se copia y se actualiza campo
            $archivo = $request->file('pdf');
            $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
            $topic->documento = $archivo->getClientOriginalName();
        }

        $topic->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)     // a veces se usa delete en vez de destroy
    {
        $topic->delete();
    }
}
