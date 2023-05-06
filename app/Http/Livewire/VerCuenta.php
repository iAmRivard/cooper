<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;

class cuentas extends Component
{
    use WithPagination;

    public $cuenta;

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        $movimientos = Ctr_cuenta_det::where('ctr_cuentas_id', '=', $this->cuenta->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.ver-cuenta', compact('movimientos'));
    }
}
