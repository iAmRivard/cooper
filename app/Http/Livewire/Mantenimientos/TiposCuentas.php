<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\Crc_tipos_cuenta;

class TiposCuentas extends Component
{
    use WithPagination;

    public $cuenta_id;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $cuentas = Crc_tipos_cuenta::paginate(10);

        return view('livewire.mantenimientos.tipos-cuentas', compact('cuentas'));
    }

    public function actualizarEstado(Crc_tipos_cuenta $cuenta)
    {
        if($cuenta->estado == 1){
            $cuenta->update([
                'estado' => 0
            ]);
        } else {
            $cuenta->update([
                'estado' => 1
            ]);
        }

        $this->emitTo('mantenimientos.tipos-cuentas', 'render');
    }

}
