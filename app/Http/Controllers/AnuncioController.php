<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Anuncio::get();
    }

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
    public function filtrar($textoafiltrar = '%')
    {

        if (isset($textoafiltrar)) {
       
                return Anuncio::where('titulo', 'like', '%' . $textoafiltrar . '%')
                    ->orWhere('descripcion', 'like', '%' . $textoafiltrar . '%')->get();

        } else {

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
    public function store(Request $request)
    {
        try {
            // dd($request);
            $anuncio = new Anuncio();
            $anuncio->titulo = $request->titulo;
            $anuncio->descripcion = $request->descripcion;
            $anuncio->enlace = $request->enlace;
            // $anuncio->enlace = $request->enlace;

            if ($request->hasFile('documento_nuevo')) {

                $archivo = $request->file('documento_nuevo');
                $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
                $anuncio->documento = $archivo->getClientOriginalName();
            }

            $anuncio->save();
            return response()->json(['message' => 'Registro creado y Archivo subido '], 200);
        } catch (\Exception $e) {
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
    public function show(Anuncio $anuncio)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anuncio = Anuncio::find($request->id);
        // Getting values from the blade template form
        $anuncio->titulo =  $request->titulo;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->enlace = $request->enlace;
        $anuncio->documento = $request->documento;
        if ($request->hasFile('documento_nuevo')) {

            $archivo = $request->file('pdf');
            $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
            $anuncio->documento = $archivo->getClientOriginalName();
        }
        $anuncio->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        $anuncio->delete();
    }
}
