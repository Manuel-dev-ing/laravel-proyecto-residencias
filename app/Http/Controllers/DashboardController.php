<?php

namespace App\Http\Controllers;

use App\Models\Incidences;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $total_incidencias = Incidences::count();
        $total_incidencias_abiertas = Incidences::where('incident_status', 'Abierto')->count();
        $total_incidencias_cerrada = Incidences::where('incident_status', 'Cerrado')->count();
        // dd($total_incidencias_cerrada);

        return view('dashboard', [
            'total_incidencias' => $total_incidencias,
            'incidencias_abiertas' => $total_incidencias_abiertas,
            'incidencias_cerradas' => $total_incidencias_cerrada
        ]);
    }
}
