<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TipoMovimientoCredito;

class TiposAbonoCreditos extends Component
{
    use WithPagination;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $tipos = TipoMovimientoCredito::all();

        return view('livewire.mantenimientos.tipos-abono-creditos', compact('tipos'));
    }
}
