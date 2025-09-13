<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Incidences;
use Illuminate\Http\Request;

class IncidencesController extends Controller
{
    
    public function index(){
        $incidencias = Incidences::all();

        return response()->json($incidencias);
    }


}
