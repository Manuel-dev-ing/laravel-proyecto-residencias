<?php

namespace App\Http\Controllers;

use App\Models\Incidences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $total_incidencias = Incidences::count();
        $total_incidencias_abiertas = Incidences::where('incident_status', 'Abierto')->count();
        $total_incidencias_cerrada = Incidences::where('incident_status', 'Cerrado')->count();
        // dd($total_incidencias_cerrada);

        $incidencias_sucursal = Incidences::select('sucursales.name as sucursal', 
                                        DB::raw('COUNT(incidences.id) as total'))
                                        ->join('users', 'incidences.user_id' , '=', 'users.id')
                                        ->join('sucursales', 'users.sucursal_id', '=', 'sucursales.id')
                                        ->groupBy('sucursales.name')
                                        ->get();
        $sucursales = $incidencias_sucursal->pluck('sucursal');
        $totales = $incidencias_sucursal->pluck('total');

        // dd($totales);                                    

        return view('dashboard', [
            'total_incidencias' => $total_incidencias,
            'incidencias_abiertas' => $total_incidencias_abiertas,
            'incidencias_cerradas' => $total_incidencias_cerrada,
            'sucursales' => $sucursales,
            'totales' => $totales
        ]);
    }
}
