<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enlace;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Enlace::get();
    }

    public function filtrar($textoafiltrar = '%')
    {

        if (isset($textoafiltrar)) {
            return Enlace::where('tema', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('detalle', 'like', '%' . $textoafiltrar . '%')
                ->orWhere('organismo', 'like', '%' . $textoafiltrar . '%')->get();
        } else {

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
            $enlace = new Enlace();
            $enlace->titulo = $request->titulo;
            $enlace->sitioweb = $request->sitioweb;

            $enlace->save();
            return response()->json(['message' => 'Registro creado '], 200);
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
    public function show(Enlace $enlace)
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
        $enlace = Enlace::find($request->id);

        // if (count($enlace) == 1) {
            // Getting values from the blade template form

            $enlace->titulo = $request->titulo;
            $enlace->sitioweb = $request->sitioweb;
            $enlace->save();
        // } else {
        //     // Getting values from the blade template form

        //     $enlace = new Enlace();
        //     $enlace->titulo = $request->titulo;
        //     $enlace->sitioweb = $request->sitioweb;

        //     $enlace->save();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enlace $enlace)
    {
        $enlace->delete();
    }
}
