<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;

class Table extends Component
{

    public $socio, $desde, $hasta, $cuenta, $mov = [];

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
        $this->mov = Ctr_cuenta_det::where('ctr_cuentas_id', '=', $this->cuenta)
                                ->whereBetween('created_at', [$this->desde, $this->hasta])
                                ->get();
    }
}
