<?php

namespace App\Helpers;

use App\Models\Crc_tipos_cuenta;
use Carbon\Carbon;

class AhorroHelper
{
    public static function calcularTablaAmortizacion(Crc_tipos_cuenta $tipoCUenta, int $plazo, Carbon $dia = null, $monto): array
    {
        // Inicializar variables
        $tasaInteresQuincenal = ($tipoCUenta->porcentaje / 100) / 24; // Tasa de interés quincenal
        $capitalActual = $monto; // Capital actual al inicio
        $tablaMovimientos = []; // Arreglo para almacenar los movimientos

        // Calcular y almacenar los movimientos en la tabla
        for ($quincena = 1; $quincena <= $plazo; $quincena++) {

            $interesQuincena = 0.00;
            if ($tipoCUenta->aplica_monto == false && $quincena != 1) {
             $interesQuincena = $capitalActual * $tasaInteresQuincenal;
               $capitalActual += $interesQuincena + $monto;
            }

            if ($tipoCUenta->aplica_monto == true && $quincena != 1) {
                $interesQuincena = $monto * $tasaInteresQuincenal;
                $capitalActual += $interesQuincena;
             }
            

            $tablaMovimientos[] = [
                'quincena' => number_format($quincena, 0),
                'interes' => number_format($interesQuincena, 2),
                'capital' => number_format($capitalActual, 2),
                'monto' => number_format($monto, 2)
            ];
        }

        return $tablaMovimientos;
    }
}
