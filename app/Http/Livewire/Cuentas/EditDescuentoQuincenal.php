<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class EditDescuentoQuincenal extends Component
{
    public $open = false;

    public $cuenta, $descuento_quincenal;

    protected $rules = [
        'descuento_quincenal'   =>  'required|number',
    ];

    public function mount(Ctr_cuenta $cuetna)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        return view('livewire.cuentas.edit-descuento-quincenal');
    }

    public function actualizar()
    {
        $this->validate();

        $this->cuenta->pago_quincenal = $this->descuento_quincenal;
        $this->save();

        $this->emit('exito', 'Descuento quincenal actualizado');

        $this->reset([
            'open',
        ]);
    }
}
