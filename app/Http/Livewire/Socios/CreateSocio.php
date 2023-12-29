<?php

namespace App\Http\Livewire\Socios;

// use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

use Livewire\Component;

//Models
use App\Models\User;
use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;
use App\Models\crm_empresas;

use Carbon\Carbon;

class CreateSocio extends Component
{
    public $open = false;

    public $nombres, $apellidos, $dui, $nit, $direccion, $salario, $correo, $empresa, $aportacion, $codigoEmpleado, $numero_socio;

    public $municipio, $departamento, $dui_epiracion, $fecha_nacimiento, $fecha_inicio, $cargo, $numero_dependencia, $profesion_uficio;

    protected $rules = [
        'nombres'       => 'required',
        'apellidos'     => 'required',
        'dui'           => 'min:10|max:10|unique:crm_socios',
        'direccion'     => 'required',
        'salario'       => 'required',
        'correo'        => 'email|unique:crm_socios',
        'empresa'       => 'required',
        'departamento'  => 'required',
        'municipio' => 'required',
        'dui_epiracion'    => 'required',
        'fecha_nacimiento'  => 'required',
        'fecha_inicio'  => 'required',
        'cargo' => 'required',
        'profesion_uficio'  => 'required',
        'numero_dependencia'    => 'required',
    ];

    public function render()
    {
        $empresas = crm_empresas::all();

        return view('livewire.socios.create-socio', compact('empresas'));
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
            'rol'   => 'socio',
        ]);

        $new_socio = Crm_socios::create([
            'nombres'       => strtoupper($this->nombres),
            'apellidos'     => strtoupper($this->apellidos),
            'dui'           => $this->dui,
            'nit'           => $this->nit ?? null,
            'direccion'     => strtoupper($this->direccion),
            'correo'        => $this->correo,
            'salario'       => $this->salario,
            'estado'        => true,
            'aportacion'    => $this->aportacion,
            'user_id'       => $user->id,
            'empresa_id'    => $this->empresa,
            'codigo_empleado'   => $this->codigoEmpleado,
            'numero_socio'  =>  $this->numero_socio,
            'departamento'  => $this->departamento,
            'municipio'  => $this->municipio,
            'dui_epiracion'   =>  Carbon::parse($this->dui_epiracion),
            'fecha_nacimiento'  => Carbon::parse($this->fecha_nacimiento),
            'edad'  => Carbon::now()->diffInYears(Carbon::parse($this->fecha_nacimiento)),
            'fecha_inicio'  =>  Carbon::parse($this->fecha_inicio),
            'cargo' =>  $this->cargo,
            'profesion_uficio'  =>  $this->profesion_uficio,
            'numero_dependencia'    =>  $this->numero_dependencia,
        ]);

        $toDay = getDate();
        //Creamos la cuenta inicial (Considerando que el primer registro es la cuenta)
        Ctr_cuenta::create([
            'no_cuenta'             => strval($toDay["year"] . $toDay["mon"] . $new_socio->id . $new_socio->id),
            'crm_socio_id'          => $new_socio->id,
            'crc_topo_cuenta_id'    => 1,
            'saldo_actual'          => 0,
            'estado'                => true,
        ]);

        $this->emitTo('socios.socios', 'render');

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
