<?php

namespace App\Helpers;

use App\Models\Crc_tipos_cuenta;
use Carbon\Carbon;

class AhorroHelper
{
    public static function calcularTablaAmortizacion(Crc_tipos_cuenta $tipoCUenta, int $plazo, Carbon $dia = null, $monto): array
    {
        // Inicializar variables
        $tasaInteres =  ($tipoCUenta->porcentaje / 100) /  ($tipoCUenta->aplica_monto == false ? 24 : 12); // Tasa de interés quincenal/mensual

        $capitalActual = $monto; // Capital actual al inicio
        $tablaMovimientos = []; // Arreglo para almacenar los movimientos

        // Calcular y almacenar los movimientos en la tabla
        for ($quincena = 1; $quincena <= $plazo; $quincena++) {

            $interesQuincena = 0.00;
            if ($tipoCUenta->aplica_monto == false && $quincena != 1) {

                $capitalActual += $monto;

                if ($quincena % 2 == 0) { // Si es par deberá calcular interes.
                    $interesQuincena = $capitalActual * $tasaInteres;
                }

                $capitalActual +=  $interesQuincena;
            }

            if ($tipoCUenta->aplica_monto == true && $quincena != 1) {
                $interesQuincena = $monto * $tasaInteres;
                $capitalActual += $interesQuincena;
            }


            $tablaMovimientos[] = [
                'quincena' => number_format($quincena, 0),
                'interes' => number_format($interesQuincena, 2),
                'capital' => number_format($capitalActual, 2),
                'monto' => number_format($monto, 2),
                'tasaInteres' => number_format($tasaInteres, 6)
            ];
        }
        return $tablaMovimientos;
    }

    public static function calcularProyeccionCuotasOld(Crc_tipos_cuenta $tipoCuenta, int $cantidadQuincenas, int $quincenaActual, $monto): array
    {
        $tasaInteres = ($tipoCuenta->porcentaje / 100) / ($tipoCuenta->aplica_monto == false ? 24 : 12);
        $capitalActual = $monto;

        $tablaProyeccion = [];
        $cuotasFaltantes = min($cantidadQuincenas - $quincenaActual, 3);

        for ($i = 1; $i <= $cuotasFaltantes; $i++) {
            $quincena = $quincenaActual + $i;
            $interesQuincena = 0.00;

            if ($tipoCuenta->aplica_monto == false) {
                if ($quincena % 2 == 0) {
                    $interesQuincena = $capitalActual * $tasaInteres;
                }
                $capitalActual += ($quincena == 1) ? 0 : $monto + $interesQuincena;
            } else {
                $interesQuincena = ($quincena == 1) ? 0 : ($monto * $tasaInteres);
                $capitalActual += ($quincena == 1) ? 0 : $interesQuincena;
            }

            $tablaProyeccion[] = [
                'quincena' => number_format($quincena, 0),
                'interes' => number_format($interesQuincena, 2),
                'capital' => number_format($capitalActual, 2),
                'monto' => number_format($monto, 2),
                'tasaInteres' => number_format($tasaInteres, 6)
            ];
        }

        return $tablaProyeccion;
    }

    public static function calcularProyeccionCuotas(Crc_tipos_cuenta $tipoCuenta, int $cantidadQuincenas, int $quincenaActual, $monto): array
    {
        $tasaInteres = ($tipoCuenta->porcentaje / 100) / ($tipoCuenta->aplica_monto == false ? 24 : 12);
        $capitalInicial = $monto;

        // Calcular el capital inicial hasta la quincena actual
        for ($q = 1; $q <= $quincenaActual; $q++) {
            if ($tipoCuenta->aplica_monto == false && $q % 2 == 0) {
                $interes = $capitalInicial * $tasaInteres;
                $capitalInicial += $monto + $interes;
            } else if ($tipoCuenta->aplica_monto == true) {
                $interes =  ($q == 1) ? 0 : ($monto * $tasaInteres);
                $capitalInicial +=  ($q == 1) ? 0 :  $interes;
            }
        }

        $tablaProyeccion = [];
        $cuotasFaltantes = min($cantidadQuincenas - $quincenaActual, 3);
        $capitalActual = $capitalInicial;

        for ($i = 1; $i <= $cuotasFaltantes; $i++) {
            $quincena = $quincenaActual + $i;
            $interesQuincena = 0.00;

            if ($tipoCuenta->aplica_monto == false && $quincena % 2 == 0) {
                $interesQuincena = $capitalActual * $tasaInteres;
                $capitalActual += $monto + $interesQuincena;
            } else if ($tipoCuenta->aplica_monto == true) {
                $interesQuincena = ($quincena == 1) ? 0 : ($monto * $tasaInteres);
                $capitalActual +=  ($quincena == 1) ? 0 : $interesQuincena;
            }

            $tablaProyeccion[] = [
                'quincena' => number_format($quincena, 0),
                'interes' => number_format($interesQuincena, 2),
                'capital' => number_format($capitalActual, 2),
                'monto' => number_format($monto, 2),
                'tasaInteres' => number_format($tasaInteres, 6)
            ];
        }

        return $tablaProyeccion;
    }
}
