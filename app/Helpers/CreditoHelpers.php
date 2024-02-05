<?php

namespace App\Helpers;

//Models
use App\Models\Credito;

//Enums
use App\Enums\Credito\StateCreditoEnum;
use App\Enums\CtrPlanPagoDet\StatePlanPagoDet;
use App\Models\CrtPlanPagoDet;

class CreditoHelpers
{
    /**
     * Undocumented function
     *
     * @param string $ctr_id
     * @return boolean
     * 0 = NOT ACTIVE
     * 1 = ACTIVE
     */
    public static function validateState(string $ctr_id): bool
    {
        $crt = Credito::where('id', $ctr_id)->first();

        $status = StateCreditoEnum::ACTIVE->value;
        if ($crt->estado == StateCreditoEnum::NOT_ACTIVE->value) {
            $status = StateCreditoEnum::NOT_ACTIVE->value;
        }

        return $status;
    }

    /**
     * Calcula la cuota quincenal del credito
     *
     * @param float $monto
     * @param float $tasaInteresQuincenal
     * @param integer $numeroQuincenas
     * @return float
     */
    public static function calcularCuotaQuincenal(
        float $monto,
        float $tasaInteresQuincenal,
        int $numeroQuincenas
    ): float {
        $tasaInteresDecimal = $tasaInteresQuincenal / 100;
        $factorAmortizacion = (1 - pow(1 + $tasaInteresDecimal, -$numeroQuincenas)) / $tasaInteresDecimal;

        $cuotaQuincenal = $monto / $factorAmortizacion;

        return $cuotaQuincenal;
    }

    /**
     * Genera tabla de amortización de credito
     *
     * @param float $monto
     * @param float $tasaInteresQuincenal
     * @param integer $numeroQuincenas
     * @return array
     */
    public static function generarTablaAmortizacion(
        float $monto,
        float $tasaInteresQuincenal,
        int $numeroQuincenas
    ): array {
        $tasaInteresDecimal = $tasaInteresQuincenal / 100;
        $saldo = $monto;
        $cuotaQuincenal = self::calcularCuotaQuincenal($monto, $tasaInteresQuincenal, $numeroQuincenas);
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

    /**
     * Actualiza el detalle de los pagos
     *
     * @param Credito $credito
     * @return void
     */
    public static function updateCuotasCredito(Credito $credito): void
    {
        $plan = CrtPlanPagoDet::where('credito_id', $credito->id)->get();

        foreach ($plan as $detalle) {
            if ($detalle->nro_cuota > $credito->cuota_actual) {
                continue;
            }
            $detalle->estado = StatePlanPagoDet::PAGADO->value;
            $detalle->update();
        }
    }
}
