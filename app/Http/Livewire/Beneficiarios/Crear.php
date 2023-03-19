<?php

namespace App\Http\Livewire\Beneficiarios;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Crm_beneficiarios;

class Crear extends Component
{
    public $open = false;

    public $error = false;

    public $socio, $nombres, $apellidos, $parentesco, $fecha_nacimiento, $porcentaje, $direccion, $phone_number;

    protected $rules = [
        'nombres'           =>  'required',
        'apellidos'         =>  'required',
        'parentesco'        =>  'required',
        'fecha_nacimiento'  =>  'required',
        'porcentaje'        =>  'required',
        'phone_number'      =>  'required'
    ];

    public function mount(Crm_socios $socio)
    {
        $this->socio = $socio;
    }

    public function render()
    {
        return view('livewire.beneficiarios.crear');
    }

    public function agregar()
    {
        $this->validate();

        $porcentajes = 0;

        foreach($this->socio->beneficiarios as $beneficiario)
        {
            $porcentajes += $beneficiario->porcentaje;
        }

        if($porcentajes <= 100 && $this->porcentaje + $porcentajes <= 100)
        {
            Crm_beneficiarios::create([
                'nombres'           =>  $this->nombres,
                'apellidos'         =>  $this->apellidos,
                'parentesco'        =>  $this->parentesco,
                'fecha_nacimiento'  =>  $this->fecha_nacimiento,
                'porcentaje'        =>  $this->porcentaje,
                'direccion'         =>  $this->direccion,
                'crm_socio_id'      =>  $this->socio->id,
                'phone_number'      =>  $this->phone_number
            ]);

            $this->emitTo('beneficiarios.tabla', 'render');

            $this->reset([
                'open',
                'nombres',
                'apellidos',
                'parentesco',
                'fecha_nacimiento',
                'porcentaje',
                'direccion',
            ]);

        } else {
            $this->error = true;
        }
    }
}
