<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use App\Models\Credito;

class ActivarDesactivar extends Component
{
    public $open = false;

    public $credito;

    public function mount(Credito $credito)
    {
        $this->credito = $credito;
    }

    public function render()
    {
        return view('livewire.creditos.activar-desactivar');
    }

    public function updateState()
    {
        $this->credito->estado  =   $this->credito->estado == 1 ? 0 : 1;
        $this->credito->save();

        $this->reset([
            'open'
        ]);
    }
}
