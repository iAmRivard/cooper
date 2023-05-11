<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Models\CrtPlanPagoDet;
use App\Models\TipoCredito;
use App\Models\CrtPlanPago;
use App\Models\Crm_socios;
use App\Models\CrcPeriodo;
use App\Models\Credito;
use App\Models\CreditoDet;

class CrearCredito extends Component
{
    public $open = false;

    public $selec_socio, $tipo_cuenta, $monto, $porcentaje, $cuotaFija = 0.00, $periodo, $tabla_amortizacion, $no_cuenta, $comentarios, $tipos_creditos;

    public $socios = [];

    public $buscar_socio = '';

    protected $rules = [
        'monto'         =>  'required',
        'porcentaje'    =>  'required',
        'cuotaFija'     =>  'required',
        'periodo'       =>  'required',
        'comentarios'   =>  'max:255'
        // 'no_cuenta'     =>  'unique:creditos'
    ];

    public function mount()
    {
        $this->tipos_creditos = TipoCredito::get();
    }

    public function updatedTipoCuenta($value)
    {
        $data = $this->tipos_creditos->filter(function ($tipo_credito) use ($value) {
            return $tipo_credito->id == $value;
        });

        if ($data->count() > 0) {
            $this->porcentaje = ROUND((($data->first()->porcentaje_interes/24)),2);
        }
    }

    public function calcularAmortizacion()
    {
        $this->validate();

        $this->reset(['tabla_amortizacion']);

        $monto = $this->monto;
        $porcentajeQuincenal = $this->porcentaje;
        $periodoQuincenal = $this->periodo;

        $this->cuotaFija  = round($this->calcularCuotaQuincenal($monto, $porcentajeQuincenal, $periodoQuincenal), 2);
        $tablaAmortizacion = $this->generarTablaAmortizacion($monto, $porcentajeQuincenal, $periodoQuincenal);

        $plan_pagos = [];

        $primer_pago = [
            'socio_id'           => $this->selec_socio,
            'user_id'            => Auth::id(),
            'nro_cuota'          => 0,
            'cuota'              => $this->cuotaFija,
            'interes'            => 0,
            'interes_acumulado'  => 0,
            'cuota_capital'      => 0,
            'saldo'              => $this->monto,
            'capital_amortizado' => 0,
            'fecha_programada'   => 0
        ];

        array_push($plan_pagos, $primer_pago);

        $capital_amortizado_acumulado = 0;
        $interes_acumulado = 0;

        foreach ($tablaAmortizacion as $fila) {
            $capital_amortizado_acumulado += $fila['capital'];
            $interes_acumulado += $fila['interes'];

            $pago = [
                'socio_id'           => $this->selec_socio,
                'user_id'            => Auth::id(),
                'nro_cuota'          => $fila['quincena'],
                'cuota'              => $this->cuotaFija,
                'interes'            => round($fila['interes'], 2),
                'interes_acumulado'  => round($interes_acumulado, 2),
                'cuota_capital'      => round($fila['capital'], 2),
                'saldo'              => round($fila['saldo']) == -0 ? 0 : round($fila['saldo']),
                'capital_amortizado' => round($capital_amortizado_acumulado, 2),
                'fecha_programada'   => ''
            ];

            array_push($plan_pagos, $pago);
        }

        $this->tabla_amortizacion = $plan_pagos;
    }

    function calcularCuotaQuincenal($monto, $tasaInteresQuincenal, $numeroQuincenas)
    {
        $tasaInteresDecimal = $tasaInteresQuincenal / 100;
        $factorAmortizacion = (1 - pow(1 + $tasaInteresDecimal, -$numeroQuincenas)) / $tasaInteresDecimal;

        $cuotaQuincenal = $monto / $factorAmortizacion;

        return $cuotaQuincenal;
    }

    function generarTablaAmortizacion($monto, $tasaInteresQuincenal, $numeroQuincenas)
    {
        $tasaInteresDecimal = $tasaInteresQuincenal / 100;
        $saldo = $monto;
        $cuotaQuincenal = $this->calcularCuotaQuincenal($monto, $tasaInteresQuincenal, $numeroQuincenas);
        $tablaAmortizacion = [];

        for ($i = 1; $i <= $numeroQuincenas; $i++) {
            $interesPagado = $saldo * $tasaInteresDecimal;
            $capitalPagado = $cuotaQuincenal - $interesPagado;
            $saldo -= $capitalPagado;

            $tablaAmortizacion[] = [
                'quincena' => $i,
                'cuota' => $cuotaQuincenal,
                'interes' => $interesPagado,
                'capital' => $capitalPagado,
                'saldo' => $saldo
            ];
        }

        return $tablaAmortizacion;
    }

    public function render()
    {
        return view('livewire.creditos.crear-credito');
    }

    public function buscar()
    {
        $this->socios = Crm_socios::where('nombres', 'like', '%' . $this->buscar_socio . '%')
            ->orWhere('apellidos', 'like', '%' . $this->buscar_socio . '%')
            ->orWhere('dui', 'like', '%' . $this->buscar_socio . '%')
            ->orWhere('codigo_empleado', 'like', '%' . $this->buscar_socio . '%')
            ->get();
    }

    public function crear()
    {
        $toDay = getDate();

        $nuevo_credito = new Credito();
        $nuevo_credito->socio_id = $this->selec_socio;
        $nuevo_credito->tipo_credito_id = $this->tipo_cuenta;
        $nuevo_credito->monto = $this->monto;
        $nuevo_credito->saldo_actual = $this->monto;
        $nuevo_credito->porcentaje_interes = $this->porcentaje;
        $nuevo_credito->cantidad_cuotas = $this->periodo;
        $nuevo_credito->estado = 1;
        $nuevo_credito->de_baja = 0;
        $nuevo_credito->comentarios = $this->comentarios;


        if ($this->no_cuenta != "") {
            $nuevo_credito->no_cuenta = $this->no_cuenta;
        } else {
            $nuevo_credito->no_cuenta = strval($toDay["year"] . $toDay["mon"] .  $this->selec_socio . $this->tipo_cuenta);
        }
        $nuevo_credito->save();

        $abono = CreditoDet::create([
            'credito_id'                    => $nuevo_credito->id,
            'socio_id'                      => $this->selec_socio,
            'tipo_movimiento_credito_id'    => 1, // APERTURA DE CREDITO
            'monto'                         => $this->monto,
            'descripcion'                   => 'APERTURA DE CRÉDITO'
        ]);

        $periodo = new CrcPeriodo();
        $periodo->valor = $this->periodo;
        if ($this->periodo > 1) {
            $periodo->descripcion = $this->periodo . " Meses";
        } else {
            $periodo->descripcion = $this->periodo . " Mese";
        }
        $periodo->estado = 1;
        $periodo->user_id = Auth::id();
        $periodo->save();

        $plan_pago = CrtPlanPago::create([
            'credito_id' => $nuevo_credito->id,
            'user_id' => Auth::id(),
            'pediodo_id' => $periodo->id,
            'socio_id' => $this->selec_socio,
            'monto' => $this->monto,
            'cuota_fija' => $this->cuotaFija,
            'interes_acumulado' => 0,
            'refinanciamiento' => 0,
            'vigente' => 1,
            'estado' => 1
        ]);

        foreach ($this->tabla_amortizacion as $tabla => $t) {
            CrtPlanPagoDet::create([
                'plan_pago_id'  =>  $plan_pago->id,
                'credito_id'    =>  $nuevo_credito->id,
                'socio_id'      =>  $this->selec_socio,
                'user_id'       =>  Auth::id(),
                'nro_cuota'     =>  $t['nro_cuota'],
                'cuota'         =>  $t['cuota'],
                'interes'       =>  $t['interes'],
                'interes_acumulado' =>  $t['interes_acumulado'],
                'cuota_capital' =>  $t['cuota_capital'],
                'saldo'         =>  $t['saldo'],
                'capital_amortizado'    =>  $t['capital_amortizado'],
                'fecha_programada'  =>  Carbon::now(),
                'estado'        =>  1,
            ]);
        }

        $this->emitTo('creditos.index', 'render');

        $this->emit('exito', 'El credito fue creado con exito');

        $this->reset([
            'open',
            'selec_socio',
            'tipo_cuenta',
            'monto',
            'porcentaje',
            'tabla_amortizacion'
        ]);

        return redirect()->route('creditos');
    }
}
