<?php

namespace App\Http\Livewire\Movimientos;

use Livewire\Component;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;
use App\Models\Crc_tipos_de_movimiento;

class Retiros extends Component
{
    public $open = false;

    public $error = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta_select, $monto, $descripcion, $tipo, $cuenta_retirada;

    protected $rules = [
        'cuenta_select' => 'required',
        'monto' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required',
    ];

    public function render()
    {
        $tiposMovimiento = Crc_tipos_de_movimiento::all();

        return view('livewire.movimientos.retiros', compact('tiposMovimiento'));
    }

    public function buscar()
    {
        $this->cuentas = Ctr_cuenta::where('no_cuenta', 'like', '%' . $this->buscar_cuenta . '%')
                                    ->get();
    }

    public function retirar()
    {
        $this->validate();

        $this->cuenta_retirada = Ctr_cuenta::find($this->cuenta_select);

        if($this->monto <= $this->cuenta_retirada->saldo_actual)
        {
            $retiro = Ctr_cuenta_det::create([
                'tipo_movimiento_id' => $this->tipo,
                'concepto' => $this->descripcion,
                'monto' => $this->monto,
                'naturaleza' => 0,
                'ctr_cuentas_id' => $this->cuenta_select,
            ]);

            $this->cuenta_retirada->saldo_actual = $this->cuenta_retirada->saldo_actual + $this->monto;

            $this->cuenta_retirada->save();

            $this->reset([
                'open',
                'tipo',
                'monto',
                'descripcion',
                'cuentas'
            ]);


            $this->emit('exito', 'Retiro procesado exitosamente');

            return redirect()->route('cuenta.retiro', compact('retiro'));
        } else
        {
            $this->error = true;
        }




    }
}
