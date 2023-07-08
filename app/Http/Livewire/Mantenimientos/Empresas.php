<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\crm_empresas;

class Empresas extends Component
{
    public $open = false, $open_empresa = false;

    public $nombre, $empresa_selected;

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

    public function buscarEmpresa($empresaId)
    {
        $this->empresa_selected    =   DB::table('crm_empresas')
            ->find($empresaId);
        $this->open_empresa = true;
    }
}
