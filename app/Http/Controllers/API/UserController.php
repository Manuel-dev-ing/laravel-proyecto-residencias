<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Incidences;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        // $usuarios = User::all();
        $usuarios = User::where('rol_id', 1)->get();
        // dd($usuarios);
        
        return response()->json($usuarios);
    }

    public function store(Request $request){
        $incidencia = Incidences::find($request->id);
        // dd($incidencia);
        
        $incidencia->assigned_user = $request->asignarUsuario;
        $incidencia->save();

        session()->flash('mensaje', 'Usuario asignado correctamente');

        return redirect()->route('incidencias.index');

    }

}
