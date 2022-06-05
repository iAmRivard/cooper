<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;

class Table extends Component
{

    public $socio, $desde, $hasta, $mov = [];

    public function mount(Crm_socios $socio)
    {
        $this->socio = $socio;
    }

    public function render()
    {
        return view('livewire.socios.table');
    }

    public function buscar()
    {
        // Consultas para buscar las transacciones por fecha
    }
}
