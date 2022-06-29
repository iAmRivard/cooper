<?php

namespace App\Http\Livewire\Creditos;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\Credito;

class Index extends Component
{
    use WithPagination;

    public  $buscar;

    protected $listeners = ['render' => 'render'];

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function render()
    {
        $creditos = Credito::where('id', 'like', '%' . $this->buscar . '%')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        return view('livewire.creditos.index', compact('creditos'));
    }
}
