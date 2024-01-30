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
        $creditos = Credito::with('socio', 'tipoCredito')
            ->when($this->buscar, function ($query) {
                return $query->where('no_cuenta', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('socio', function ($q) {
                        $q->where('nombres', 'like', '%' . $this->buscar . '%')
                            ->orWhere('codigo_empleado', 'like', '%' . $this->buscar . '%')
                            ->orWhere('numero_socio', 'like', '%' . $this->buscar . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.creditos.index', compact('creditos'));
    }
}
