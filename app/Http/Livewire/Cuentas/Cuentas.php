<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class Cuentas extends Component
{

    public  $buscarCuenta;

    public function render()
    {

        $cuentas = Ctr_cuenta::where('no_cuenta', 'like', '%' . $this->buscarCuenta . '%')
                            ->get();

        return view('livewire.cuentas.cuentas', compact('cuentas'));
    }
}
