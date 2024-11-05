<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

//Enums
use App\Enums\Credito\StateCreditoEnum;

//Helpers
use App\Helpers\CreditoHelpers;

//Models
use App\Models\TipoMovimientoCredito;
use App\Models\CrtPlanPagoDet;
use App\Models\CreditoDet;
use App\Models\Credito;

class Abono extends Component
{
    public $open = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta, $monto, $descripcion, $tipo, $cuenta_abonada, $cuota_cacelada, $intereses;

    protected $rules = [
        'cuenta'        => 'required',
        'monto'         => 'required',
        'descripcion'   => 'required',
        'tipo'          => 'required',
    ];

    public function selectCuenta($value)
    {
        $credito_select = Credito::with('tipoCredito')->find($value);

        $cuota      =   CrtPlanPagoDet::where('nro_cuota', '>=', 1)
            ->where('estado', 1)
            ->where('credito_id', $credito_select->id)
            ->first();

        $tipo_abono =   TipoMovimientoCredito::where('nombre', 'like', '%' . 'ABONO CREDITO' . '%')->first();

        if ($cuota) {
            $this->cuota_cacelada   =   $cuota;
            $this->monto            =   $cuota->cuota;
            $this->tipo             =   $tipo_abono->id ? $tipo_abono->id  : '';
            $this->descripcion      =   "ABONO CRÉDITO #$credito_select->no_cuenta POR $" . number_format($this->monto, 2) . ".\nINTERESES $" . $cuota->interes . "\nCAPITAL $" . $cuota->cuota_capital . "\nCUOTA #" . $cuota->nro_cuota;
            $this->intereses        =   $cuota->intereses;
        }
    }

    public function resetProperties()
    {
        $this->reset([
            // 'cuota_cacelada',
            'monto',
            'tipo',
            'descripcion'
        ]);
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
                            ->orWhere('dui', 'like', '%' . $this->buscar_cuenta . '%')
                            ->orWhere('numero_socio', '%' . $this->buscar_cuenta . '%');
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

        if ($this->monto > $this->cuenta_abonada->saldo_actual && !($this->cuota_cacelada)) {
            $this->addError('count', 'No es posible abonar, debido a que el monto supera el saldo actual de la cuenta: $'. $this->cuenta_abonada->saldo_actual);
            return;
        }

        if (
            CreditoHelpers::validateState($this->cuenta) === StateCreditoEnum::NOT_ACTIVE->value
        ) {
            $this->addError('cuenta', 'Credito finalizado, el credito se encuentra finalizado.');
            return;
        }

        $this->validate();

        $montoAbonado = $this->monto;

        if(($this->cuota_cacelada)){
            //dd($this->cuota_cacelada->interes);
            $montoAbonado = $this->monto - floatval($this->cuota_cacelada->intereses);

            
        $abonoIntereses = CreditoDet::create([
            'credito_id'                    => $this->cuenta,
            'socio_id'                      => $this->cuenta_abonada->socio->id,
            'tipo_movimiento_credito_id'    => $this->tipo,
            'monto'                         => floatval($this->cuota_cacelada->intereses),
            'descripcion'                   => 'GENERACIÓN DE INTERESES: $' . ($this->cuota_cacelada->intereses)
        ]);

        }



        $abono = CreditoDet::create([
            'credito_id'                    => $this->cuenta,
            'socio_id'                      => $this->cuenta_abonada->socio->id,
            'tipo_movimiento_credito_id'    => $this->tipo,
            'monto'                         => $montoAbonado,
            'descripcion'                   => $this->descripcion
        ]);


        $this->cuenta_abonada = Credito::find($this->cuenta);

        $this->cuenta_abonada->saldo_actual = $this->cuenta_abonada->saldo_actual - $this->monto;


        if ($this->cuota_cacelada) {
            $this->cuota_cacelada->estado   =   0;
            $this->cuenta_abonada->cuota_actual = $this->cuenta_abonada->cuota_actual + 1;
            $this->cuota_cacelada->save();
        }

        $this->cuenta_abonada->save();

        $this->emit('exito', 'Abono procesado exitosamente');

        $this->emitTo('creditos.index', 'render');

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion'
        ]);

        return redirect()->route('credito.abono', $abono);
    }

    public function searchAccounts($searchTerm)
    {
        return Credito::with(['socio', 'tipoCredito', 'planPago'])
            ->when($searchTerm, function ($query) use ($searchTerm) {
                return $query->where('no_cuenta', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('socio', function ($q) use ($searchTerm) {
                        $q->where('nombres', 'like', '%' . $searchTerm . '%')
                            ->orWhere('codigo_empleado', 'like', '%' . $searchTerm . '%')
                            ->orWhere('dui', 'like', '%' . $searchTerm . '%')
                            ->orWhere('numero_socio', 'like', '%' . $searchTerm . '%');
                    });
            })
            ->where('estado', 1)
            ->orderBy('created_at', 'desc')
            ->get()->jsonSerialize();
    }

    public function searCuota($credito_id)
    {
        $cuota = CrtPlanPagoDet::where('nro_cuota', '>=', 1)
            ->where('estado', 1)
            ->where('credito_id', $credito_id)
            ->first();

        return $cuota ? $cuota->jsonSerialize() : null;
    }
}
