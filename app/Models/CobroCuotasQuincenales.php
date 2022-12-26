<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CobroCuotasQuincenales extends Model
{
    use HasFactory;

    protected $fillable =   [
        'tipo',
        'socio',
        'codigo_empleado',
        'no_cuenta',
        'tipo_cuenta',
        'pago_quincenal',
        'cuota'
    ];
}
