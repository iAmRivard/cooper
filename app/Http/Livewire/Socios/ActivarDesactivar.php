<?php

namespace App\Http\Livewire\Socios;

use Livewire\Component;

use App\Models\Crm_socios;

class ActivarDesactivar extends Component
{
    public $open = false;

    public $socio;

    public function mount(Crm_socios $socio)
    {
        $this->socio = $socio;
    }

    public function render()
    {
        return view('livewire.socios.activar-desactivar');
    }

    public function update()
    {
        $this->socio->estado = false;
        $this->socio->save();

        $this->emit('exito', 'El estado del socio ha sido actualizado');

        $this->reset([
            'open'
        ]);
    }
}
