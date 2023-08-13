<?php

namespace App\Helpers;

use App\Models\Crc_tipos_cuenta;
use Carbon\Carbon;

class AhorroHelper
{
    public static function calcularTablaAmortizacion(Crc_tipos_cuenta $tipoCUenta, int $plazo, Carbon $dia = null, float $monto): array
    {
        // Inicializar variables
        $tasaInteresQuincenal = ($tipoCUenta->porcentaje / 100) / 24; // Tasa de interés quincenal
        $capitalActual = $monto; // Capital actual al inicio
        $tablaMovimientos = []; // Arreglo para almacenar los movimientos

        // Calcular y almacenar los movimientos en la tabla
        for ($quincena = 1; $quincena <= $plazo; $quincena++) {
            $interesQuincena = $capitalActual * $tasaInteresQuincenal;
            $capitalActual += $interesQuincena;

            $tablaMovimientos[] = [
                'quincena' => number_format($quincena, 2),
                'interes' => number_format($interesQuincena, 2),
                'capital' => number_format($capitalActual, 2)
            ];
        }

        return $tablaMovimientos;
    }
}
