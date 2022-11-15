<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class ActivarDesactivarCuenta extends Component
{
    public $cuenta, $open = false;

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        return view('livewire.cuentas.activar-desactivar-cuenta');
    }

    public function desactivar()
    {
        $this->cuenta->estado = !$this->cuenta->estado;
        $this->cuenta->save();

        $this->emit('exito', 'La cuenta fue desactivada con exito');

        $this->reset([
            'open'
        ]);
    }
}
