<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TipoMovimientoCredito;

class TiposAbonoCreditos extends Component
{
    use WithPagination;

    public $nombre, $naturaleza, $open = false, $editTipo;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'naturaleza'    =>  'required',
        'nombre'        =>  'required'
    ];

    public function render()
    {
        $tipos = TipoMovimientoCredito::paginate(10);

        return view('livewire.mantenimientos.tipos-abono-creditos', compact('tipos'));
    }

    public function openModal($tipoId)
    {
        $this->editTipo = TipoMovimientoCredito::find($tipoId);

        $this->nombre = $this->editTipo->nombre;
        $this->naturaleza = $this->editTipo->naturaleza;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $this->editTipo->nombre =   $this->nombre;
        $this->editTipo->naturaleza = $this->naturaleza;
        $this->editTipo->save();

        $this->reset([
            'naturaleza',
            'editTipo',
            'nombre',
            'open'
        ]);
    }
}
