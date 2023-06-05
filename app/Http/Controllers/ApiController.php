<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calificacion;
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



    public function storeCalificacion(Request $request){
        $calificacion = Calificacion::create([
            'id_calificante' => $request->id_calificante,
            'id_calificado' => $request->id_calificado,
            'puntaje' => $request->puntaje,
        ]);

        if(!$calificacion){
            return response()->json(['message' => 'Error al registrar calificacion']);
        }

        return response()->json(['message' => 'Calificacion registrada correctamente']);
    }

}
