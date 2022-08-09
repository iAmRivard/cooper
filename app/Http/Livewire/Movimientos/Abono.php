<?php

namespace App\Http\Livewire\Movimientos;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;
use App\Models\Crc_tipos_de_movimiento;

class Abono extends Component
{
    use AuthorizesRequests;

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
        $tiposMovimiento = Crc_tipos_de_movimiento::where('naturaleza', '=', '1')
                                                ->get();

        return view('livewire.movimientos.abono', compact('tiposMovimiento'));
    }

    public function buscar()
    {
        $this->cuentas = Ctr_cuenta::where('no_cuenta', 'like', '%' . $this->buscar_cuenta . '%')
                                    ->get();
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

        $socioId = $this->cuenta_abonada->crm_socio_id;
        // dd($socioId);

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion'
        ]);
    }

}
