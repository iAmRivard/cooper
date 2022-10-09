<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Crc_tipos_de_movimiento;

class TiposAbono extends Component
{
    use WithPagination;

    protected $listeners = ['render' => 'render'];

    public $open = false, $nombre, $naturaleza, $descripcion, $editTipo;

    protected $rules = [
        'nombre'    =>  'required|string',
        'naturaleza'    =>  'required',
        'descripcion'   =>  'required',
    ];

    public function render()
    {
        $tipos = Crc_tipos_de_movimiento::paginate(10);

        return view('livewire.mantenimientos.tipos-abono', compact('tipos'));
    }

    public function openModal($tipoId)
    {
        $this->editTipo = Crc_tipos_de_movimiento::find($tipoId);

        $this->nombre       = $this->editTipo->nombre;
        $this->naturaleza   = $this->editTipo->naturaleza;
        $this->descripcion  = $this->editTipo->descripcion;

        $this->open = true;
    }

    public function guardar()
    {
        $this->validate();

        $this->editTipo->nombre         = $this->nombre;
        $this->editTipo->naturaleza     = $this->naturaleza;
        $this->editTipo->descripcion    = $this->descripcion;
        $this->editTipo->save();

        $this->emitTo('mantenimientos.tipos-abono', 'render');

        $this->reset([
            'open',
            'nombre',
            'descripcion',
            'naturaleza',
            'editTipo'
        ]);
    }
}
