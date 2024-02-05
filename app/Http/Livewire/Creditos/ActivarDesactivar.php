<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

//Enums
use App\Enums\Credito\StateCreditoEnum;

//Modes
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
        $this->credito->estado  =   $this->credito->estado === StateCreditoEnum::ACTIVE->value ? StateCreditoEnum::NOT_ACTIVE->value : StateCreditoEnum::ACTIVE->value;
        $this->credito->update();

        $message    =   $this->credito->estado === StateCreditoEnum::NOT_ACTIVE->value ? 'Credito desactivado' : 'Credito Activado';

        $this->emit('exito', $message);

        $this->reset([
            'open'
        ]);
    }
}
