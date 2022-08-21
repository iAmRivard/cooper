<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TipoCredito;

class TiposCreditos extends Component
{
    use WithPagination;

    public $cuenta_id;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $cuentas = TipoCredito::paginate(10);

        return view('livewire.mantenimientos.tipos-creditos', compact('cuentas'));
    }

    public function actualizarEstado(TipoCredito $cuenta)
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
