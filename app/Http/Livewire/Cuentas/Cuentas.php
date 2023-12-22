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
        $cuentas = Ctr_cuenta::with('socio', 'tipoCuenta')
            ->when($this->buscar, function ($query) {
                return $query->where('no_cuenta', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('socio', function ($q) {
                        $q->where('nombres', 'like', '%' . $this->buscar . '%')
                            ->orWhere('dui', 'like', '%' . $this->buscar . '%')
                            ->orWhere('codigo_empleado', 'like', '%' . $this->buscar . '%')
                            ->orWhere('numero_socio', 'like', '%' . $this->buscar . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.cuentas.cuentas', compact('cuentas'));
    }
}
