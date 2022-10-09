<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use App\Models\crm_empresas;

class Empresas extends Component
{
    public $open = false, $nombre;

    protected $rules = [
        'nombre'    => 'required|string'
    ];

    public function render()
    {
        $empresas   =   crm_empresas::all();

        return view('livewire.mantenimientos.empresas', compact('empresas'));
    }

    public function save()
    {
        $this->validate();

        $empresa = crm_empresas::create([
            'nombre'    =>  $this->nombre,
        ]);

        $this->emitTo('mantenimientos.tipos-cuentas', 'render');

        $this->emit('exito', 'Empresa creada exitosamente');

        $this->reset([
            'open',
            'nombre',
        ]);

    }
}
