<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function storeUser(Request $request){
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'registro' => 'required|unique:users',
            'numero_telefono' => 'required|max:8|unique:users',
            'foto' => 'required',
            'foto_horario' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'registro' => $request->registro,
            'numero_telefono' => $request->numero_telefono,
            'foto' => $request->foto,
            'foto_horario' => $request->foto_horario,
        ]);

        // if(!$user){
            
        //     return response()->json(['message' => 'Error al registrar usuario']);
            
        // }

        return response()->json(['message' => 'Usuario registrado correctamente']);
    }



    public function storeCalificacion(Request $request){
        $this->validate($request, [
            'id_calificante' => 'required',
            'id_calificado' => 'required',
            'puntaje' => 'required|numeric',
        ]);
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



    public function getUser(Request $request){

        $user = User::where('registro', $request->registro)->first();
        
        if(!$user){
            return response()->json([
                'msg' => 'Usuario no registrado'
            ]);
        }

        
        if(Hash::check($request->password, $user->password)){
            return response()->json([
                'msg' => 'Usuario validado'
            ]);
        }else{
            return response()->json([
                'msg' => 'Contraseña incorrecta'
            ]);
        }
    }
}
