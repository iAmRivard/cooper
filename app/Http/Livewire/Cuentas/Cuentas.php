<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Ctr_cuenta;

class Cuentas extends Component
{

    public  $buscarCuenta;

    public $ver_cuenta = false;
    public $table_off = true;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $cuentas = Ctr_cuenta::where('no_cuenta', 'like', '%' . $this->buscarCuenta . '%')
                            ->get();

        return view('livewire.cuentas.cuentas', compact('cuentas'));
    }

    public function verCuenta()
    {
        $this->ver_cuenta = true;
        $this->table_off = false;

    }

}
