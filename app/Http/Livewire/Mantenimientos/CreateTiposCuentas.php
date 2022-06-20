<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use App\Models\Crc_tipos_cuenta;

class CreateTiposCuentas extends Component
{
    public $open = false;

    public $nombre, $descripcion;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required'
    ];

    public function render()
    {
        return view('livewire.mantenimientos.create-tipos-cuentas');
    }

    public function guardar()
    {
        $this->validate();

        $tipoCUenta = new Crc_tipos_cuenta;

        $tipoCUenta->nombre = $this->nombre;
        $tipoCUenta->descripcion = $this->descripcion;
        $tipoCUenta->estado = 1;
        $tipoCUenta->save();

        $this->emitTo('mantenimientos.tipos-cuentas', 'render');
    }
}
