<?php

namespace App\Http\Controllers;

use App\Models\compras;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Compras::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'vapes_id'=> 'required',
            'cantidad'=> 'required'
        ]);

        $compra = new Compras;
        $compra->fecha = $request->fecha;
        $compra->vapes_id = $request->vapes_id;
        $compra->cantidad = $request->cantidad;
        $compra->save();

        return $compra;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, compras $compras)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, compras $compras)
    {
        $request->validate([
            'fecha' => 'required',
            'vapes_id'=> 'required',
            'cantidad'=> 'required'
        ]);

        
        $compras->fecha = $request->fecha;
        $compras->vapes_id = $request->vapes_id;
        $compras->cantidad = $request->cantidad;
        $compras->update();
        
        return $compras;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compras =  compras::find($id);
        if(is_null($compras)){
            return response()->json('No se pudo realizar correctamnet la opracion',404 );
        }
        $compras->delete();
        return response()->noContent();
    }
}
