<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Crm_socios;

class Socios extends Component
{

    use WithPagination;

    // protected $paginationTheme ='bootstrap';

    public $buscarSocio, $socio;

    public $open_edit = false;

    public $nueva_contrasena = false;

    public $error = false;

    public function mount()
    {
        $this->socio = new Crm_socios;
    }

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'socio.nombres' => 'required',
        'socio.apellidos' => 'required',
        'socio.dui' => 'required|min:9|max:9',
        'socio.nit' => 'required|min:13|max:13',
        'socio.direccion' => 'required',
        'socio.salario' => 'required',
        'socio.correo' => 'required|email'
    ];

    public function updatingBuscarSocio()
    {
        $this->resetPage();
    }


    public function render()
    {

        // TODO: Agregar campo full name a la tabla socios
        $socios = Crm_socios::where('nombres', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('apellidos', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('dui', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('nit', 'like', '%' . $this->buscarSocio . '%')
                            ->orderBy('id', 'desc') //Ordenamos de manera descendente
                            ->paginate(5);


        return view('livewire.socios.socios', compact('socios'));
    }

    public function editar(Crm_socios $socio)
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

    public function actualizar_pass(Crm_socios $socio)
    {
        $this->socio = $socio;
        $this->nueva_contrasena = true;
    }

}
