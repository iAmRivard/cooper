<?php

namespace App\Http\Livewire\Cuentas;

use App\Models\Crc_tipos_de_movimiento;
use App\Models\Ctr_cuenta_det;
use App\Models\Ctr_cuenta;

use Livewire\Component;

class Retiros extends Component
{
    public $open_retiro = false;

    public $cuenta, $monto, $tipo, $descripcion;

    public $rules = [
        'tipo' => 'required',
        'monto' =>  'required',
        'descripcion' => 'required'
    ];

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        $tiposMovimientos = Crc_tipos_de_movimiento::all();

        return view('livewire.cuentas.retiros', compact('tiposMovimientos'));
    }

    public function retirar()
    {
        if($monto <= $this->cuenta->saldo_actual) {
            $retiro = Ctr_cuenta_det::create([
                'tipo_movimiento_id' => $this->tipo,
                'concepto' => $this->descripcion,
                'monto' => -$this->monto,
                'ctr_cuentas_id' => $this->cuenta->id
            ]);

            $this->cuenta->saldo_actual = $this->cuenta->saldo_actual - $this->monto;
            $this->cuenta->save();

            $this->emitTo('cuentas.cuentas','render');

            $this->reset([
                'open_retiro',
                'tipo',
                'monto',
                'descripcion'
            ]);
        }

        //Se necesita enviar una alerta


    }
}
