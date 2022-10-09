<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use App\Models\Crc_tipos_de_movimiento;

class CreateTiposAbono extends Component
{
    public $open = false;

    public $nombre, $naturaleza, $descripcion;

    protected $rules = [
        'nombre'        => 'required',
        'descripcion'   => 'required',
        'naturaleza'    => 'required'
    ];

    public function render()
    {
        return view('livewire.mantenimientos.create-tipos-abono');
    }

    public function guardar()
    {
        $this->validate();

        Crc_tipos_de_movimiento::create([
            'nombre'        => $this->nombre,
            'descripcion'   => $this->descripcion,
            'naturaleza'    => $this->naturaleza
        ]);

        $this->emitTo('mantenimientos.tipos-abono', 'render');

        $this->reset([
            'open',
            'nombre',
            'descripcion',
            'naturaleza'
        ]);
    }
}
