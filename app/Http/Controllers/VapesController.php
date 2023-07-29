<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use App\Models\vapes;
use Illuminate\Http\Request;

class VapesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vapes::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'marca'=> 'required',
            'sabor'=> 'required',
            'precio'=> 'required',
            'existencias'=> 'required',
        ]);

        $vape = new vapes;
        $vape->nombre = $request->nombre;
        $vape->marca = $request->marca;
        $vape->sabor = $request->sabor;
        $vape->precio = $request->precio;
        $vape->existencias = $request->existencias;
        $vape->desechable = $request->desechable;
        $vape->img = $request->img;
        $vape->save();

        return $vape;
    }

    /**
     * Display the specified resource.
     */
    public function show(vapes $vapes)
    {
        return Vapes::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vapes $vape)
    {
        $request->validate([
            'nombre' => 'required',
            'marca'=> 'required',
            'sabor'=> 'required',
            'precio'=> 'required',
            'existencias'=> 'required',
        ]);

        $vape->nombre = $request->nombre;
        $vape->marca = $request->marca;
        $vape->sabor = $request->sabor;
        $vape->precio = $request->precio;
        $vape->existencias = $request->existencias;
        $vape->desechable = $request->desechable;
        $vape->img = $request->img;
        $vape->update();

        return $vape;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuarios =  usuarios::find($id);
        if(is_null($usuarios)){
            return response()->json('No se pudo realizar correctamnet la opracion',404 );
        }
        $usuarios->delete();
        return response()->noContent();
    }
}
