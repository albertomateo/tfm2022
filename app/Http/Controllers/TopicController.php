<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Topic::get();
    }

    public function filtrar($textoafiltrar = '%')
    {

        if (isset($textoafiltrar)) {
            return Topic::where('tema', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('detalle', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('organismo', 'like', '%' . $textoafiltrar . '%')->get();
        } else {

            return Topic::all();
        }

        if (is_null($textoafiltrar)) {
            return Topic::all();
        }
        if (empty($textoafiltrar)) {
            return Topic::all();
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
            $topic = new Topic();
            $topic->organismo = $request->organismo;
            $topic->tema = $request->tema;
            $topic->detalle = $request->detalle;
            $topic->observaciones = $request->observaciones;
            $topic->enlace = $request->enlace;
            $topic->orden = $request->orden;
            $topic->destacado = $request->destacado;
            // $topic->enlace = $request->enlace;

            if ($request->hasFile('documento_nuevo')) {

                $archivo = $request->file('documento_nuevo');
                $archivo->move(public_path() . '/DOCUMENTOS/', $archivo->getClientOriginalName());
                $topic->documento = $archivo->getClientOriginalName();
                
            }

            $topic->save();
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
    public function show(Topic $topic)
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
        $topic = Topic::find($request->id);
        // Getting values from the blade template form
        $topic->organismo = $request->organismo;
        $topic->tema = $request->tema;
        $topic->detalle = $request->detalle;
        $topic->observaciones = $request->observaciones;
        $topic->enlace = $request->enlace;
        $topic->orden = $request->orden;
        $topic->destacado = $request->destacado;
        if ($request->hasFile('documento_nuevo')) {

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
    public function destroy(Topic $topic)
    {
        $topic->delete();
    }
}
