<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'img'=> 'required'
        ]);

        $marca = new Marca;
        $marca->nombre = $request->nombre;
        $marca->img = $request->img;
        $marca->save();

        return $marca;
    }

    /**
     * Display the specified resource.
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marca $marca)
    {
        $request->validate([
            'nombre' => 'required',
            'img'=> 'required'
        ]);

        $marca->nombre = $request->nombre;
        $marca->img = $request->img;
        $marca->update();

        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marcas =  marca::find($id);
        if(is_null($marcas)){
            return response()->json('No se pudo realizar correctamnet la opracion',404 );
        }
        $marcas->delete();
        return response()->noContent();
    }
    
}
