<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class Abonos extends Component
{
    public $open_abono = false;

    public function render()
    {
        // $cuentas = Ctr_cuenta

        return view('livewire.cuentas.abonos');
    }
}
