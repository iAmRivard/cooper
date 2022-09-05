<?php

namespace App\Http\Livewire\Mantenimientos;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\Crc_tipos_cuenta;

class TiposCuentas extends Component
{
    use WithPagination;

    public $cuenta_id, $open_modal = false, $editTipo, $nombre, $descripcion, $porcentaje, $plazo;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'nombre'        =>  'required',
        'descripcion'   =>  'required',
        'porcentaje'    =>  'required',
        'plazo'         =>  'required'
    ];

    public function render()
    {
        $cuentas = Crc_tipos_cuenta::paginate(10);

        return view('livewire.mantenimientos.tipos-cuentas', compact('cuentas'));
    }

    public function actualizarEstado(Crc_tipos_cuenta $cuenta)
    {
        if($cuenta->estado == 1){
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

    public function openModal($cuentaId)
    {
        $this->open_modal = true;

        $this->editTipo = Crc_tipos_cuenta::where('id', $cuentaId)->first();

        $this->nombre       = $this->editTipo->nombre;
        $this->descripcion  = $this->editTipo->descripcion;
        $this->porcentaje   = $this->editTipo->porcentaje;
        $this->plazo        = $this->editTipo->plazo;
    }

    public function updateTipo()
    {
        $this->validate();

        $this->editTipo->nombre = $this->nombre;
        $this->editTipo->descripcion = $this->descripcion;
        $this->editTipo->porcentaje = $this->porcentaje;
        $this->editTipo->plazo = $this->plazo;

        $this->editTipo->save();

        $this->emitTo('mantenimientos.tipos-cuentas','render');

        $this->reset([
            'nombre',
            'descripcion',
            'porcentaje',
            'plazo',
            'open_modal',
        ]);

    }

}
