<?php

use Carbon\Carbon;


function fecha($fecha){
    $fechaAsignacion = Carbon::parse($fecha)->format('Y/m/d H:i:s');
    return $fechaAsignacion;
}

function formatearFecha($fecha) {
    
    if ($fecha == NULL) {
        return '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Sin Asignar</span>';

    } else {
        $fechaAsignacion = Carbon::parse($fecha)->format('Y/m/d');
        return '<span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full ">'. $fechaAsignacion .'</span';
    }

}

function usuarioAsignado($usuario){
    
    if (strlen($usuario) == 1) {

        if (auth()->user()->rol_id == 1) {
            # code...
            return '<a id="openModal" class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full cursor-pointer">Sin Asignar</a>';

        }else if(auth()->user()->rol_id == 2){
            return '<p class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Sin Asignar</p>';

        }

    } else {
        
        return '<span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full ">'. $usuario .'</span';
    }
}


function tipoPrioridad($prioridad){

    if ($prioridad == "Alto") {
            return  '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Alto</span>';
        
        }else if($prioridad == "Medio"){
            return '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Medio</span>';
        
        }else if($prioridad == "Bajo"){
            return '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Bajo</span>';
        
        }

}


function tipoUsuario($rol){

    if ($rol == "administrador") {
            return  '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Administrador</span>';
        
        }else if($rol == "usuario"){
            return '<span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Usuario</span>';
        
        }

}







?>


