<?php

namespace App\Http\Livewire\Beneficiarios;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Crm_beneficiarios;

class Tabla extends Component
{
    public $socio, $beneficiario;
    public $error = false;
    public $open = false;

    public function mount(Crm_socios $socio)
    {
        $this->socio = $socio;
        $this->beneficiario = new Crm_beneficiarios;
    }

    protected $rules = [
        'beneficiario.nombres'          => 'required',
        'beneficiario.apellidos'        => 'required',
        'beneficiario.parentesco'       => 'required',
        'beneficiario.fecha_nacimiento' => 'required',
        'beneficiario.porcentaje'       => 'required',
        'beneficiario.direccion'        => 'required',
        'beneficiario.numero_telefono'  => 'required'
    ];

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        return view('livewire.beneficiarios.tabla');
    }

    public function editar(Crm_beneficiarios $beneficiario)
    {
        $this->open = true;
        $this->beneficiario = $beneficiario;
    }

    public function actualizar()
    {
        $this->validate();

        $this->beneficiario->save();

        $this->reset([
            'open'
        ]);
    }
}
