<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

//Models
use App\Models\Credito;
use App\Models\CrcPeriodo;
use App\Models\CreditoDet;
use App\Models\CrtPlanPago;
use App\Models\CrtPlanPagoDet;

//Helpers
use App\Helpers\CreditoHelpers;

use Carbon\Carbon;

class FixCreditoController extends Controller
{
    public function fix(Credito $credito)
    {
        if (!$credito) {
            return abort(404, 'Credito no existe');
        }

        $credito->load('socio');

        $monto = $credito->monto;

        if ($credito->porcentaje_interes == 0) {
            $porcentajeQuincenal = $credito->porcentaje_interes;
        } else {
            $porcentajeQuincenal = $credito->porcentaje_interes / 24;
        }
        $periodoQuincenal = $credito->cantidad_cuotas;

        $cuotaFija  = round(CreditoHelpers::calcularCuotaQuincenal($monto, $porcentajeQuincenal, $periodoQuincenal), 2);
        $tablaAmortizacion = CreditoHelpers::generarTablaAmortizacion($monto, $porcentajeQuincenal, $periodoQuincenal);

        $plan_pagos = [];

        $primer_pago = [
            'socio_id'           => $credito->socio->id,
            'user_id'            => Auth::id(),
            'nro_cuota'          => 0,
            'cuota'              => $cuotaFija,
            'interes'            => 0,
            'interes_acumulado'  => 0,
            'cuota_capital'      => 0,
            'saldo'              => round($monto, 2),
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
                'socio_id'           => $credito->socio->id,
                'user_id'            => Auth::id(),
                'nro_cuota'          => $fila['quincena'],
                'cuota'              => $cuotaFija,
                'interes'            => round($fila['interes'], 2),
                'interes_acumulado'  => round($interes_acumulado, 2),
                'cuota_capital'      => round($fila['capital'], 2),
                'saldo'              => round($fila['saldo'], 2) == -0 ? 0 : round($fila['saldo'], 2),
                'capital_amortizado' => round($capital_amortizado_acumulado, 2),
                'fecha_programada'   => ''
            ];

            array_push($plan_pagos, $pago);
        }
        //Eliminadmos
        $this->eliminarRegistros($credito->id);


        if (CreditoDet::where('credito_id', $credito->id)->count() == 0) {
            CreditoDet::create([
                'credito_id'                    => $credito->id,
                'socio_id'                      => $credito->socio->id,
                'tipo_movimiento_credito_id'    => 1, // APERTURA DE CREDITO
                'monto'                         => $monto,
                'descripcion'                   => 'APERTURA DE CRÉDITO'
            ]);
        }

        $periodo = new CrcPeriodo();
        $periodo->valor = $periodoQuincenal;
        if ($periodoQuincenal > 1) {
            $periodo->descripcion = $periodo . " Meses";
        } else {
            $periodo->descripcion = $periodo . " Mese";
        }
        $periodo->estado = 1;
        $periodo->user_id = Auth::id();
        $periodo->save();

        $plan_pago = CrtPlanPago::create([
            'credito_id'        => $credito->id,
            'user_id'           => Auth::id(),
            'pediodo_id'        => $periodo->id,
            'socio_id'          => $credito->socio->id,
            'monto'             => $monto,
            'cuota_fija'        => $cuotaFija,
            'interes_acumulado' => 0,
            'refinanciamiento'  => 0,
            'vigente'           => 1,
            'estado'            => 1
        ]);

        foreach ($plan_pagos as $tabla => $t) {
            CrtPlanPagoDet::create([
                'plan_pago_id'          =>  $plan_pago->id,
                'credito_id'            =>  $credito->id,
                'socio_id'              =>  $credito->socio->id,
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

        CreditoHelpers::updateCuotasCredito($credito);

        return redirect()->route('ver.credito', $credito->id);
    }

    private function eliminarRegistros(string $credito_id)
    {
        if (CreditoDet::where('credito_id', $credito_id)->count() == 0) {
            try {
                CreditoDet::where('credito_id', $credito_id)->delete();
            } catch (\Exception $e) {
                Log::error("Error en eliminación de detalles de credito FixCreditoController linea 136 \n" . $e->getMessage());
            }
        }

        try {
            CrtPlanPago::where('credito_id', $credito_id)->delete();
        } catch (\Exception $e) {
            Log::error("Error en eliminación de control de pagos de credito FixCreditoController linea 142 \n" . $e->getMessage());
        }

        try {
            CrtPlanPagoDet::where('credito_id', $credito_id)->delete();
        } catch (\Exception $e) {
            Log::error("Error en eliminación de control de pagos de credito FixCreditoController linea 148 \n" . $e->getMessage());
        }
    }
}
