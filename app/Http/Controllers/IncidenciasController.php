<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Incidences;
use App\Models\Priorities;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class IncidenciasController extends Controller
{
    
    public function index(){

        if (auth()->check() && auth()->user()->rol->name === 'administrador') {

            $incidencias = Incidences::with(['category', 'priority', 'assignedUser'])->paginate(4);    

        }else if(auth()->check() && auth()->user()->rol->name === 'usuario'){

            $id_usuario = auth()->user()->id;
            $incidencias = Incidences::with(['category', 'priority', 'assignedUser'])
                                        ->where("user_id", $id_usuario)                        
                                        ->paginate(4);
        }  

        // dd($incidencias);


        return view('incidencias.index', [
            'incidencias' => $incidencias
        ]);
    }

    public function create(){

        $categorias = Categories::all();
        $prioridades = Priorities::all();
        // dd($prioridades);

        return view('incidencias.create', [
            'categorias' => $categorias,
            'prioridades' => $prioridades
        ]);
    }

    public function store(Request $request){


        
        $request->validate([
            'name' => 'required',
            'priority' => 'required',
            'category' => 'required',
            'descripcion' => 'required'

        ]);

        $descripcion = Purifier::clean($request->descripcion);
        Incidences::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'priority_id' => $request->priority,
            'title' => $request->name,
            'description' => $descripcion,
            'incident_status' => "Abierto",
            

        ]);

        session()->flash('mensaje', 'La Incidencia se publico correctamente');

        return redirect()->route('incidencias.index');

        
    }

    public function show(Incidences $incidencia){
      

       return view('incidencias.show', [
            'incidencia' => $incidencia
       ]);
    }

}
