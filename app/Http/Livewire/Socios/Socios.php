<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;
use Livewire\WithPagination;

//models
use App\Models\Crm_socios;
use App\Models\crm_empresas;
use Carbon\Carbon;

class Socios extends Component
{
    use WithPagination;

    public $buscarSocio, $socio;

    public $open_edit = false;
    public $socioActivo = true;

    public $nueva_contrasena = false;

    public $error = false;

    public function mount()
    {
        $this->socio = new Crm_socios();
        $this->socio->fecha_inicio = Carbon::parse($this->socio->fecha_inicio)->format('Y-m-d');
    }

    protected $listeners = ['render' => 'render'];

    protected function rules()
    {
        return [
            'socio.nombres' => 'required',
            'socio.apellidos' => 'required',
            'socio.aportacion' => 'required',
            'socio.empresa_id' => 'required',
            'socio.codigo_empleado' => 'required',
            'socio.dui' => ['min:10', 'max:10', 'unique:crm_socios,dui,' . $this->socio->id],
            'socio.direccion' => 'required',
            'socio.salario' => 'required',
            'socio.correo' => ['required', 'email', 'unique:crm_socios,correo,' . $this->socio->id],
            'socio.departamento' => 'required',
            'socio.municipio' => 'required',
            'socio.dui_epiracion' => 'required',
            'socio.fecha_nacimiento' => 'required',
            'socio.fecha_inicio' => 'required',
            'socio.cargo' => 'required',
            'socio.profesion_uficio' => 'required',
            'socio.numero_dependencia' => 'required',
        ];
    }

    public function updatingBuscarSocio()
    {
        $this->resetPage();
    }

    public function render()
    {
        $empresas = crm_empresas::all();
    
        $socios = Crm_socios::with('empresa')
            ->where(function ($query) {
                $query->where('nombres', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('numero_socio', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('codigo_empleado', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('apellidos', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('dui', 'like', '%' . $this->buscarSocio . '%')
                    ->orWhere('nit', 'like', '%' . $this->buscarSocio . '%');
            })
            ->where('estado', $this->socioActivo) // Aplica el filtro de socio activo
            ->orderBy('id', 'desc')
            ->paginate(10);
    
        return view('livewire.socios.socios', compact('socios', 'empresas'));
    }
    

    public function editar(Crm_socios $socio): void
    {
        $this->socio = $socio;
        $this->open_edit = true;
    }

    public function actualizar()
    {
        $this->validate();

        $this->socio->save();

        $this->reset([
            'open_edit'
        ]);
    }

    public function actualizar_pass(Crm_socios $socio): void
    {
        $this->socio = $socio;
        $this->nueva_contrasena = true;
    }

        /**
     * Calcula la edad actual del socio según su fecha de nacimiento.
     * 
     * @return int|null Devuelve la edad en años o null si no se establece la fecha de nacimiento.
     */
    public function calcularEdad()
    {
        if ($this->socio->fecha_nacimiento) {
            return Carbon::parse($this->socio->fecha_nacimiento)->age;
        }
        return null; // Retorna null si no hay fecha de nacimiento
    }
}
