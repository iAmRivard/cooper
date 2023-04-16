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

    public $selec_socio, $tipo_cuenta, $monto, $porcentaje, $cuotaFija, $periodo, $tabla_amortizacion, $no_cuenta, $comentarios;

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

    public function calcularAmortizacion()
    {
        $this->validate();

        $this->reset(['tabla_amortizacion']);

        $plan_pagos = [];

        $frist = [
            'socio_id'  => $this->selec_socio,
            'user_id'   => Auth::id(),
            'nro_cuota' => 0,
            'cuota' => $this->cuotaFija,
            'interes'   =>  ($this->porcentaje / 100),
            'interes_acumulado' => 0,
            'cuota_capital' =>  0,
            'saldo' => $this->monto,
            'capital_amortizado'    => 0,
            'fecha_programada'  => 0
        ];

        array_push($plan_pagos, $frist);

        for ($i=0; $i < $this->periodo ; $i++) {

            $interes = ((float)$plan_pagos[$i]['saldo'] * ($this->porcentaje / 100));

            $interes_acumulado = ((float)$plan_pagos[$i]['interes_acumulado'] +  $interes);

            $cuota_capital = ((float)$plan_pagos[$i]['cuota'] - $interes);

            $saldo = ((float)$plan_pagos[$i]['saldo'] - $cuota_capital);

            $capital_amortizado = ((float)$plan_pagos[$i]['capital_amortizado'] + $cuota_capital);
            $semana = [
                'socio_id'  => $this->selec_socio,
                'user_id'   => Auth::id(),
                'nro_cuota' => ($i + 1),
                'cuota' => $this->cuotaFija,
                'interes'   =>  $interes,
                'interes_acumulado' => $interes_acumulado,
                'cuota_capital' =>  $cuota_capital,
                'saldo' => $saldo,
                'capital_amortizado'    => $capital_amortizado,
                'fecha_programada'  => ''
            ];
            array_push($plan_pagos, $semana);
        }

        $this->tabla_amortizacion = $plan_pagos;
    }

    public function render()
    {
        $tipos_creditos = TipoCredito::all();

        return view('livewire.creditos.crear-credito', compact('tipos_creditos'));
    }

    public function buscar()
    {
        $this->socios = Crm_socios::where('nombres', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('apellidos', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('dui', 'like', '%' . $this->buscar_socio . '%')
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

        if($this->no_cuenta != "") {
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
        if($this->periodo > 1) {
            $periodo->descripcion = $this->periodo. " Meses";
        } else {
            $periodo->descripcion = $this->periodo. " Mese";
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

        foreach($this->tabla_amortizacion as $tabla => $t) {
            CrtPlanPagoDet::create([
                'plan_pago_id'  =>  $plan_pago->id,
                'credito_id'    =>  $nuevo_credito->id,
                'socio_id'      =>  $this->selec_socio,
                'user_id'   =>  Auth::id(),
                'nro_cuota' =>  $t['nro_cuota'],
                'cuota' =>  $t['cuota'],
                'interes'   =>  $t['interes'],
                'interes_acumulado' =>  $t['interes_acumulado'],
                'cuota_capital' =>  $t['cuota_capital'],
                'saldo' =>  $t['saldo'],
                'capital_amortizado'    =>  $t['capital_amortizado'],
                'fecha_programada'  =>  Carbon::now(),
                'estado'    =>  1,
            ]);
        }

        $this->emitTo('creditos.index','render');

        $this->emit('exito', 'El credito fue creado con exito');

        $this->reset([
            'open',
            'selec_socio',
            'tipo_cuenta',
            'monto',
            'porcentaje'
        ]);

        return redirect()->route('creditos');
    }
}
