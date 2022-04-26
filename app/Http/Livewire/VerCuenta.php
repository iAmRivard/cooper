<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class VerCuenta extends Component
{
    public $cuenta;

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        return view('livewire.ver-cuenta');
    }
}
