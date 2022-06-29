<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use App\Models\TipoMovimientoCredito;

class Abono extends Component
{
    public $open = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta_select, $monto, $descripcion, $tipo, $cuenta_abonada;

    protected $rules = [
        'cuenta_select' => 'required',
        'monto' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required',
    ];

    public function render()
    {
        $tiposMovimiento = TipoMovimientoCredito::where('naturaleza', '=', '1')
                                                ->get();

        return view('livewire.creditos.abono', compact('tiposMovimiento'));
    }

    public function abonar()
    {
        $this->validate();

        $abono = Ctr_cuenta_det::create([
            'tipo_movimiento_id' => $this->tipo,
            'concepto' => $this->descripcion,
            'monto' => $this->monto,
            'naturaleza' => 1,
            'ctr_cuentas_id' => $this->cuenta_select
        ]);


        $this->cuenta_abonada = Ctr_cuenta::find($this->cuenta_select);

        $this->cuenta_abonada->saldo_actual = $this->cuenta_abonada->saldo_actual + $this->monto;

        $this->cuenta_abonada->save();

        $this->emit('exito', 'Abono procesado exitosamente');

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion'
        ]);

        return redirect()->route('cuenta.abono', compact('abono'));
    }
}
