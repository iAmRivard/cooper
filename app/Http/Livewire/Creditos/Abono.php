<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use App\Models\TipoMovimientoCredito;
use App\Models\CreditoDet;
use App\Models\Credito;
use App\Models\CrtPlanPagoDet;

class Abono extends Component
{
    public $open = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta, $monto, $descripcion, $tipo, $cuenta_abonada, $cuota_cacelada;

    protected $rules = [
        'cuenta' => 'required',
        'monto' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required',
    ];

    public function updatedCuenta($value)
    {
        $credito_select = Credito::with('tipoCredito')->find($value);

        $cuota  =   CrtPlanPagoDet::where('nro_cuota', '>=', 1)->where('estado', 1)->first();
        $tipo_abono =   TipoMovimientoCredito::where('nombre', 'like', '%' . 'ABONO CREDITO' . '%')->first();

        if($cuota) {
            $this->cuota_cacelada   =   $cuota;

            $this->monto    =   $cuota->cuota;
            $this->tipo     =   $tipo_abono->id ? $tipo_abono->id  : '';
            $this->descripcion  =   "Abono a crédito # $credito_select->no_cuenta por" . number_format($this->monto, 2);
        }
    }

    public function render()
    {
        $tiposMovimiento = TipoMovimientoCredito::where('naturaleza', '=', '0')
                                                ->get();

        $this->cuentas = Credito::with('socio')
                        ->when($this->buscar_cuenta, function ($query) {
                            return $query->where('no_cuenta', 'like', '%' . $this->buscar_cuenta . '%')
                                ->orWhereHas('socio', function ($q) {
                                    $q->where('nombres', 'like', '%' . $this->buscar_cuenta . '%')
                                        ->orWhere('codigo_empleado', 'like', '%' . $this->buscar_cuenta . '%')
                                        ->orWhere('dui', 'like', '%' . $this->buscar_cuenta . '%');
                                });
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('livewire.creditos.abono', compact('tiposMovimiento'));
    }

    public function abonar()
    {
        $this->validate();

        $this->cuenta_abonada = Credito::where('id', $this->cuenta)->first();

        if($this->monto > $this->cuenta_abonada->saldo_actual) {
            $this->addError('count', 'No es posible abonar');
        }

        $this->validate();

        $abono = CreditoDet::create([
            'credito_id'                    => $this->cuenta,
            'socio_id'                      => $this->cuenta_abonada->socio->id,
            'tipo_movimiento_credito_id'    => $this->tipo,
            'monto'                         => $this->monto,
            'descripcion'                   => $this->descripcion
        ]);

        $this->cuenta_abonada = Credito::find($this->cuenta);

        $this->cuenta_abonada->saldo_actual = $this->cuenta_abonada->saldo_actual - $this->monto;
        $this->cuenta_abonada->save();

        if($this->cuota_cacelada) {
            $this->cuota_cacelada->estado   =   0;
            $this->cuota_cacelada->save();
        }

        $this->emit('exito', 'Abono procesado exitosamente');

        $this->emitTo('creditos.index','render');

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion'
        ]);
    }
}
