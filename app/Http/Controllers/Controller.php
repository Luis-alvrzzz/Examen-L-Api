<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Controller extends BaseController
{
    public function login(Request $request)
    {
        $response = ["status" => 0, "msg" => ""];
        $data = json_decode($request->getContent());
        $user = User::where('usuario', $data->usuario)->first();
        if ($user) {
            if (Hash::check($data->contrasena, $user->contrasena)) {
                $token = $user->createToken("example");
                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;
                $response["user"] = $user;
            } else {
                $response["status"] = 0;
                $response["msg"] = "Credenciales incorrectas.";
            }
        } else {
            $response["msg"] = "Usuario no encontrado.";
        }
        return response()->json($response);
    }
}
