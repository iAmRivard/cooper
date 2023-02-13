<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobroCuotasQuincenalesPlanilla extends Model
{
    use HasFactory;

    protected $table = 'cobro_cuotas_quincenales_planilla';

    protected $fillable = [
        'codigo_empleado',
        'socio',
        'APORTACION',
        'AHORRO_QUINCENAL_VISTA',
        'AHORRO_QUINCENAL_NAVIDENO',
        'AHORRO_QUINCENAL_PROGRAMADO',
        'DESCUENTO_QUINCENAL',
        'CUOTA_PRESTAMO',
        'INTERES_PRESTAMO',
        'CAPITAL_PRESTAMO',
    ];
}
