<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuarios::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido'=> 'required',
            'usuario'=> 'required',
            'contrasena'=> 'required'
        ]);

        $usuario = new usuarios;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->save();

        return $usuario;
    }

    /**
     * Display the specified resource.
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuarios $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido'=> 'required',
            'usuario'=> 'required',
            'contrasena'=> 'required'
        ]);

        
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->usuario = $request->usuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->update();

        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario =  usuarios::find($id);
        if(is_null($usuario)){
            return response()->json('No se pudo realizar correctamnet la opracion',404 );
        }
        $usuario->delete();
        return response()->noContent();
    }


}
