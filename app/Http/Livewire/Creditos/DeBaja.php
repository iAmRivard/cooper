<?php

namespace App\Http\Livewire\Creditos;

//Enums
use App\Enums\Credito\DebajaCreditoEnum;

//Models
use App\Models\Credito;

use Livewire\Component;

class DeBaja extends Component
{
    public $open = false;

    public $credito;

    public function mount(Credito $credito)
    {
        $this->credito = $credito;
    }

    public function render()
    {
        return view('livewire.creditos.de-baja');
    }

    public function dow()
    {
        $this->credito->de_baja = $this->credito->de_baja   === DebajaCreditoEnum::ACTIVE->value ? DebajaCreditoEnum::DE_BAJA->value : DebajaCreditoEnum::ACTIVE->value;
        $this->credito->update();

        $message    =   $this->credito->de_baja === DebajaCreditoEnum::ACTIVE->value ? 'Credito Activado' : 'Credito desactivado';

        $this->emit('exito', $message);
        $this->reset([
            'open'
        ]);
    }
}
