<?php

namespace App\Livewire;

use App\Models\IncidentDetail;
use Livewire\Component;

class ListarDetalleIncidencia extends Component
{

    public $registros;
    public $incidenciaId;


    protected $listeners = ['registroGuardado' => 'cargarRegistros'];

    public function mount(){
        $this->cargarRegistros();
    }

    public function cargarRegistros(){
        // dd($this->incidenciaId);

        $this->registros = IncidentDetail::with('user.rol')
            ->where('incidence_id', $this->incidenciaId)
            ->get();   
    }

    public function render()
    {
        return view('livewire.listar-detalle-incidencia');
    }
}
