<?php

namespace App\Http\Livewire\Socios;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Livewire\Component;


use App\Models\User;
use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;

class CreateSocio extends Component
{

    public $open = false;

    public $nombres, $apellidos, $dui, $nit, $direccion, $salario, $correo;

    protected $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'dui' => 'required|min:9|max:9',
        'nit' => 'required|min:13|max:13',
        'direccion' => 'required',
        'salario' => 'required',
        'correo' => 'required|email'
    ];

    public function guardar()
    {

        $this->validate();

        Crm_socios::create([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'dui' => $this->dui,
            'nit' => $this->nit,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'salario' => $this->salario,
            'estado' => true,
            'fecha_creacion' => Carbon::today(),
            'fecha_actualizacion' => Carbon::today(),
        ]);


        // Creacuón del usuario
        User::create([
            'name' => $this->nombres . $this->apellidos,
            'email' => $this->correo,
            'password' => bcrypt($this->dui),
            'remember_token' => Str::random(10),
        ]);

        // Recuperamos el ultimoRegistro
        // $ultimoSocio = Crm_socios::last();

        // Ctr_cuenta::create([
        //     ''
        // ]);

        $this->emitTo('socios.socios','render');

        $this->reset([
            'open',
            'nombres',
            'apellidos',
            'dui',
            'nit',
            'direccion',
            'correo',
            'salario'
        ]);

    }

    public function render()
    {
        return view('livewire.socios.create-socio');
    }
}
