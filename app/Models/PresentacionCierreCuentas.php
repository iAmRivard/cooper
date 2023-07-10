<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresentacionCierreCuentas extends Model
{
    use HasFactory;

    protected $table = 'view_presentacion_cierre_cuentas';

    protected $fillable = [
        'id_cuenta',
        'nombres',
        'apellidos',
        'dui',
        'empresa',
        'id_tipo_cuenta',
        'mombre_tipo_cuenta',
        'anio',
        'mes',
        'porcentaje_anual',
        'porcentaje_mensual',
        'saldo_cierre',
        'intereses_generados',
        'saldo_final',
        'saldo_final_cierre'
    ];
}
