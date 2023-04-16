<?php

namespace App\Http\Livewire\Creditos;

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
        $this->credito->de_baja = $this->credito->de_baja  == 1 ? 0 : 1;
        $this->credito->save();

        $message    =   $this->credito->estado == 0 ? 'Credito desactivado' : 'Credito Activado';

        $this->emit('exito', $message);
        $this->reset([
            'open'
        ]);
    }
}
