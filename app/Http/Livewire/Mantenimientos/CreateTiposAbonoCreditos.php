<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use App\Models\TipoMovimientoCredito;

class CreateTiposAbonoCreditos extends Component
{
    public $open = false;

    public $nombre, $naturaleza;

    protected $rules = [
        'nombre' => 'required',
        'naturaleza' => 'required'
    ];

    public function render()
    {
        return view('livewire.mantenimientos.create-tipos-abono-creditos');
    }

    public function guardar()
    {
        $this->validate();

        TipoMovimientoCredito::create([
            'nombre' => $this->nombre,
            'naturaleza' => $this->naturaleza
        ]);

        $this->emitTo('mantenimientos.tipos-abono-creditos', 'render');

        $this->reset([
            'open',
            'nombre',
            'naturaleza'
        ]);
    }
}
