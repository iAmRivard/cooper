<?php

namespace App\Http\Livewire\Socios;

// use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Livewire\Component;


use App\Models\User;
use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;
use App\Models\Crc_tipos_cuenta;
use App\Models\crm_empresas;

class CreateSocio extends Component
{

    public $open = false;

    public $nombres, $apellidos, $dui, $nit, $direccion, $salario, $correo, $empresa, $aportacion;

    protected $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'dui' => 'required|min:10|max:10',
        'direccion' => 'required',
        'salario' => 'required',
        'correo' => 'required|email',
        'empresa' => 'required'
    ];

    public function render()
    {
        return view('livewire.socios.create-socio');
    }

    public function guardar()
    {

        $this->validate();

        // Creacuón del usuario
        $user = User::create([
            'name' => $this->nombres . $this->apellidos,
            'email' => $this->correo,
            'password' => bcrypt($this->dui),
            'remember_token' => Str::random(10),
        ]);

        $new_socio = Crm_socios::create([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'dui' => $this->dui,
            'nit' => $this->nit,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'salario' => $this->salario,
            'estado' => true,
            'aportacion' => $this->aportacion,
            'user_id' => $user->id,
        ]);

        $empresas = crm_empresas::create([
            'nombre' => $this->empresa,
            'actual' => true,
            'crm_socio_id' => $new_socio->id,
        ]);

        $toDay = getDate();

        //Creamos la cuenta inicial (Considerando que el primer registro es la cuenta)
        Ctr_cuenta::create([
            'no_cuenta' => strval($toDay["year"] . $toDay["mon"] . $new_socio->id . $new_socio->id),
            'crm_socio_id' => $new_socio->id,
            'crc_topo_cuenta_id' => 1,
            'saldo_actual' => 0,
            'estado' => true,
        ]);

        $this->emitTo('socios.socios','render');

        $this->emit('exito', 'Socio creado exitosamente');

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

        return redirect()->route('ver.socio', $new_socio);

    }

}
