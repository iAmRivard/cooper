<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;

use App\Models\Crm_socios;

class Socios extends Component
{

    public $buscarSocio;

    protected $listeners = ['render' => 'render'];


    public function render()
    {

        // TODO: Agregar campo full name a la tabla socios
        $socios = Crm_socios::where('nombres', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('apellidos', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('dui', 'like', '%' . $this->buscarSocio . '%')
                            ->orWhere('nit', 'like', '%' . $this->buscarSocio . '%')
                            ->get();

        // Recuperamos el Ultimo registro
        $se = Crm_socios::all()->last();

        return view('livewire.socios.socios', compact('socios', 'se'));
    }
}
