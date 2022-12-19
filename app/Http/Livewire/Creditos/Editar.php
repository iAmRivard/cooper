<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Credito;
use App\Models\TipoCredito;
use App\Models\CrtPlanPago;
use App\Models\CreditoDet;
use App\Models\CrcPeriodo;
use App\Models\CrtPlanPagoDet;

class Editar extends Component
{
    public $credito, $monto, $porcentaje, $periodo, $cuota_fija, $tipo_credito, $no_cuenta, $tipos_creditos, $plan_pagos;

    public $open;

    protected $rules = [
        'credito'   =>  'required',
        'no_cuenta' =>  'required',
        'monto'     =>  'required',
        'periodo'   =>  'required',
        'porcentaje'    =>  'required',
        'cuota_fija'    =>  'required',
        'tipo_credito'  =>  'required',
    ];

    public function mount(Credito $credito)
    {
        $this->tipos_creditos = TipoCredito::all();
        $this->plan_pagos   =   CrtPlanPago::where('credito_id', $credito->id)->first();

        $this->credito      =   $credito;
        $this->no_cuenta    =   $credito->no_cuenta;
        $this->monto        =   $credito->monto;
        $this->periodo      =   $credito->cantidad_cuotas;
        $this->porcentaje   =   $credito->porcentaje_interes;
        $this->cuota_fija   =   $this->plan_pagos->cuota_fija;
    }

    public function render()
    {
        return view('livewire.creditos.editar');
    }

    public function update()
    {
        $this->validate();

        $plan_pagos_det = [];

        $frist = [
            'socio_id'              =>  $this->credito->socio->id,
            'user_id'               =>  Auth::id(),
            'nro_cuota'             =>  0,
            'cuota'                 =>  $this->cuota_fija,
            'interes'               =>  ($this->porcentaje / 100),
            'interes_acumulado'     =>  0,
            'cuota_capital'         =>  0,
            'saldo'                 =>  $this->monto,
            'capital_amortizado'    =>  0,
            'fecha_programada'      =>  0
        ];

        array_push($plan_pagos_det, $frist);

        for ($i=0; $i < $this->periodo ; $i++) {
            $interes = ((float)$plan_pagos_det[$i]['saldo'] * ($this->porcentaje / 100));
            $interes_acumulado = ((float)$plan_pagos_det[$i]['interes_acumulado'] +  $interes);
            $cuota_capital = ((float)$plan_pagos_det[$i]['cuota'] - $interes);
            $saldo = ((float)$plan_pagos_det[$i]['saldo'] - $cuota_capital);
            $capital_amortizado = ((float)$plan_pagos_det[$i]['capital_amortizado'] + $cuota_capital);

            $semana = [
                'socio_id'              =>  $this->credito->socio->id,
                'user_id'               =>  Auth::id(),
                'nro_cuota'             =>  ($i + 1),
                'cuota'                 =>  $this->cuota_fija,
                'interes'               =>  $interes,
                'interes_acumulado'     =>  $interes_acumulado,
                'cuota_capital'         =>  $cuota_capital,
                'saldo'                 =>  $saldo,
                'capital_amortizado'    =>  $capital_amortizado,
                'fecha_programada'      =>  ''
            ];

            array_push($plan_pagos_det, $semana);
        }

        $this->credito->tipo_credito_id      =   $this->tipo_credito;
        $this->credito->monto                =   $this->monto;
        $this->credito->saldo_actual         =   $this->monto;
        $this->credito->porcentaje_interes   =   $this->porcentaje;
        $this->credito->cantidad_cuotas      =   $this->periodo;
        $this->credito->cuota_actual         =   0;
        $this->credito->no_cuenta            =   $this->no_cuenta;
        $this->credito->save();

        $this->credito->detalles()->delete();

        $this->credito->planPago()->delete();

        $this->credito->detallePlanPago()->delete();

        $abono = CreditoDet::create([
            'credito_id'                    => $this->credito->id,
            'socio_id'                      => $this->credito->socio->id,
            'tipo_movimiento_credito_id'    => 1, // APERTURA DE CREDITO
            'monto'                         => $this->monto,
            'descripcion'                   => 'APERTURA DE CRÉDITO'
        ]);

        $periodo = new CrcPeriodo();
        $periodo->valor = $this->periodo;
        if($this->periodo > 1) {
            $periodo->descripcion = $this->periodo. " Meses";
        } else {
            $periodo->descripcion = $this->periodo. " Mese";
        }
        $periodo->estado = 1;
        $periodo->user_id = Auth::id();
        $periodo->save();

        $plan_pago = CrtPlanPago::create([
            'credito_id'        => $this->credito->id,
            'user_id'           => Auth::id(),
            'pediodo_id'        => $periodo->id,
            'socio_id'          => $this->credito->socio->id,
            'monto'             => $this->monto,
            'cuota_fija'        => $this->cuota_fija,
            'interes_acumulado' => 0,
            'refinanciamiento'  => 0,
            'vigente'           => 1,
            'estado'            => 1
        ]);

        foreach($plan_pagos_det as $tabla => $t) {
            CrtPlanPagoDet::create([
                'plan_pago_id'          =>  $plan_pago->id,
                'credito_id'            =>  $this->credito->id,
                'socio_id'              =>  $this->credito->socio->id,
                'user_id'               =>  Auth::id(),
                'nro_cuota'             =>  $t['nro_cuota'],
                'cuota'                 =>  $t['cuota'],
                'interes'               =>  $t['interes'],
                'interes_acumulado'     =>  $t['interes_acumulado'],
                'cuota_capital'         =>  $t['cuota_capital'],
                'saldo'                 =>  $t['saldo'],
                'capital_amortizado'    =>  $t['capital_amortizado'],
                'fecha_programada'      =>  Carbon::now(),
                'estado'                =>  1,
            ]);
        }

        $this->emitTo('ver-credito','render');

        $this->emit('exito', 'El credito fue creado con exito');

        $this->reset([
            'open'
        ]);

    }
}
