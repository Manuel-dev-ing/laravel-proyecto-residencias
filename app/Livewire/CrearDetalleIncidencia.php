<?php

namespace App\Livewire;

use App\Models\Incidences;
use App\Models\IncidentDetail;
use Livewire\Component;

class CrearDetalleIncidencia extends Component
{
    public $descripcion;
    public $incidenciaId;
    public $abierto;

    public function guardar(){

        IncidentDetail::create([
            'description' => $this->descripcion,
            'incidence_id' => $this->incidenciaId,
            'user_id'=>auth()->user()->id,
            'status'=>1
        ]);

        $this->dispatch('registroGuardado');

        // Limpiamos el input
        $this->reset('descripcion');

    }

    public function cerrar(){
        
        IncidentDetail::create([
            'description' => "Incidencia cerrada",
            'incidence_id' => $this->incidenciaId,
            'user_id'=>auth()->user()->id,
            'status'=> 0
        ]);

        $incident = Incidences::find($this->incidenciaId);
        if ($incident) {
            $incident->update(['incident_status' => 'Cerrado']);
            $this->abierto = false;
            $this->dispatch('registroGuardado');
            
        }



    }


    public function render()
    {
        return view('livewire.crear-detalle-incidencia');
    }
}
