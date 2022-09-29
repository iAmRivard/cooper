<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\Crc_tipos_de_movimiento;
use App\Models\Ctr_cuenta;

class Cuentas extends Component
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
        $cuentas = Ctr_cuenta::where('id', 'like', '%' . $this->buscar . '%')
                            ->orderBy('id', 'asc')
                            ->paginate(5);

        return view('livewire.cuentas.cuentas', compact('cuentas'));
    }

}
