<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Crc_tipos_de_movimiento;
use App\Models\Ctr_cuenta_det;
use App\Models\Ctr_cuenta;

class Abonos extends Component
{
    public $open_abono = false;

    public $bottones = true;
    public $cuenta, $monto, $tipo, $descripcion;

    public $rules = [
        'cuenta.id' => 'required',
        'tipo' => 'required',
        'monto' => 'required'
    ];

    public function mount(Ctr_cuenta $cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function render()
    {
        //Crear campo en crc_tipos_movimientos para establecer si ingreso o egreso
        //¿Creará conflicto con los prestamos?
        $tiposMovimientos = Crc_tipos_de_movimiento::all();

        return view('livewire.cuentas.abonos', compact('tiposMovimientos'));
    }

    public function abonar()
    {
        $abono = Ctr_cuenta_det::create([
            'tipo_movimiento_id' => $this->tipo,
            'concepto' => $this->descripcion,
            'monto' => $this->monto,
            'ctr_cuentas_id' => $this->cuenta->id
        ]);

        $this->cuenta->saldo_actual = $this->cuenta->saldo_actual + $this->monto;
        $this->cuenta->save();


        $this->emitTo('cuentas.cuentas','render');

        $this->reset([
            'open_abono',
            'tipo',
            'monto',
            'descripcion'
        ]);

        return redirect()->route('cuenta.abono', compact('abono'));
    }

}
