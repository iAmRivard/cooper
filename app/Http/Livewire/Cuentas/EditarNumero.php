<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class EditarNumero extends Component
{
    public $open = false;

    public $cuenta, $no_cuenta;

    protected $rules = [
        'no_cuenta' => 'required|string'
    ];

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        return view('livewire.cuentas.editar-numero');
    }

    public function update()
    {
        $this->validate();

        $this->cuenta->no_cuenta = $this->no_cuenta;
        $this->save();

        $this->emit('exito', 'El número de cuenta se ha actualizado');

        $this->reset([
            'open',
        ]);
    }
}
