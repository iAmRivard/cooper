<?php

namespace App\Http\Livewire\Creditos;

use App\Models\Credito;
use Livewire\Component;

class Comentarios extends Component
{
    public $open = false;

    public $comment, $credito;

    public function mount(Credito $credito)
    {
        $this->credito = $credito;
        $this->comment = $credito->comentarios;
    }

    public function render()
    {
        return view('livewire.creditos.comentarios');
    }

    public function saveComment()
    {
        $this->credito->comentarios = $this->comment;
        $this->credito->save();

        $this->reset([
            'credito',
            'comment'
        ]);
    }
}
