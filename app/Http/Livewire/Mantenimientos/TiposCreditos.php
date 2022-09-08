<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TipoCredito;

class TiposCreditos extends Component
{
    use WithPagination;

    public $cuenta_id, $open = false, $editTipo, $nombre, $descripcion, $porcentaje;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'nombre',
        'descripcion',
        'porcentaje'
    ];

    public function render()
    {
        $cuentas = TipoCredito::paginate(10);

        return view('livewire.mantenimientos.tipos-creditos', compact('cuentas'));
    }

    public function actualizarEstado(TipoCredito $cuenta)
    {
        if($cuenta->estado == 1) {
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

    public function openModal($tipoId)
    {
        $this->editTipo = TipoCredito::find($tipoId);

        $this->nombre       =   $this->editTipo->nombre;
        $this->descripcion  =   $this->editTipo->descripcion;
        $this->porcentaje   =   $this->editTipo->porcentaje_interes;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $this->editTipo->nombre             = $this->nombre;
        $this->editTipo->descripcion        = $this->descripcion;
        $this->editTipo->porcentaje_interes = $this->porcentaje;
        $this->editTipo->save();

        $this->emitTo('mantenimientos.tipos-cuentas', 'render');

        $this->reset([
            'nombre',
            'descripcion',
            'porcentaje',
            'open'
        ]);
    }

}
