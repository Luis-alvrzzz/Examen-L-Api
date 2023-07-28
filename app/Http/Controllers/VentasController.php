<?php

namespace App\Http\Controllers;

use App\Models\ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ventas::all();
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

        $venta = new ventas;
        $venta->fecha = $request->fecha;
        $venta->vapes_id = $request->vapes_id;
        $venta->cantidad = $request->cantidad;
        $venta->save();

        return $venta;
    }

    /**
     * Display the specified resource.
     */
    public function show(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ventas $venta)
    {
        $request->validate([
            'fecha' => 'required',
            'vapes_id'=> 'required',
            'cantidad'=> 'required'
        ]);

        $venta->fecha = $request->fecha;
        $venta->vapes_id = $request->vapes_id;
        $venta->cantidad = $request->cantidad;
        $venta->update();

        return $venta;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ventas =  ventas::find($id);
        if(is_null($ventas)){
            return response()->json('No se pudo realizar correctamnet la opracion',404 );
        }
        $ventas->delete();
        return response()->noContent();
    }
}
