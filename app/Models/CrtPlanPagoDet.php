<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrtPlanPagoDet extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_pago_id',
        'credito_id',
        'socio_id',
        'user_id',
        'nro_cuota',
        'cuota',
        'interes',
        'interes_acumulado',
        'total',
        'cuota_capital',
        'saldo',
        'capital_amortizado',
        'fecha_programada',
        'estado',
    ];
}
