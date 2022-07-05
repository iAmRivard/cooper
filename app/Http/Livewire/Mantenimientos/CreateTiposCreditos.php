<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use App\Models\TipoCredito;

class CreateTiposCreditos extends Component
{
    public $open = false;

    public $nombre, $descripcion, $porcentaje;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    public function render()
    {
        return view('livewire.mantenimientos.create-tipos-creditos');
    }

    public function guardar()
    {
        $this->validate();

        $tipoCUenta = new TipoCredito;

        $tipoCUenta->nombre = $this->nombre;
        $tipoCUenta->descripcion = $this->descripcion;
        $tipoCUenta->estado = 1;
        $tipoCUenta->porcentaje = $this->porcentaje;
        $tipoCUenta->save();

        $this->emitTo('mantenimientos.tipos-creditos', 'render');

        $this->reset([
            'open',
            'nombre',
            'descripcion',
            'porcentaje'
        ]);
    }
}
