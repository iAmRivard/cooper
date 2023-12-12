<?php

namespace App\Helpers;

use App\Models\Crc_tipos_cuenta;
use Carbon\Carbon;

class AhorroHelper
{
    public static function calcularTablaAmortizacion(Crc_tipos_cuenta $tipoCUenta, int $plazo, Carbon $dia = null, $monto): array
    {
        // Inicializar variables
        $tasaInteres =  ($tipoCUenta->porcentaje / 100) /  ($tipoCUenta->aplica_monto == false ? 24 : 12 ); // Tasa de interés quincenal/mensual
        
        $capitalActual = $monto; // Capital actual al inicio
        $tablaMovimientos = []; // Arreglo para almacenar los movimientos

        // Calcular y almacenar los movimientos en la tabla
        for ($quincena = 1; $quincena <= $plazo; $quincena++) {

            $interesQuincena = 0.00;
            if ($tipoCUenta->aplica_monto == false && $quincena != 1) {
                
                if($quincena % 2 == 0){// Si es par deberá calcular interes.
                    $interesQuincena = $capitalActual * $tasaInteres;
                }
             
             $capitalActual += $interesQuincena + $monto;
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
}
