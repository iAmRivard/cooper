<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobroCuotasQuincenalesConsolidado extends Model
{
    use HasFactory;

    protected $table = 'cobro_cuotas_quincenales_consolidado';

    protected $fillable = [
        'codigo_empleado',
        'socio',
        'cuota_quincenal'
    ];
}
