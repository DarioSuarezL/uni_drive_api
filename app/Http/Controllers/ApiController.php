<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function storeUser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'registro' => $request->registro,
            'numero_telefono' => $request->numero_telefono,
            'foto' => $request->foto,
            'foto_horario' => $request->foto_horario,
        ]);

        if(!$user){
            return response()->json(['message' => 'Error al registrar usuario']);
        }

        return response()->json(['message' => 'Usuario registrado correctamente']);
    }
}
