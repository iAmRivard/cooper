<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctr_cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_cuenta',
        'id_socio',
        'id_tipo_cuenta',
        'saldo_inicial',
        'estado',
        'fecha_creacion',
        'fecha_actualizacion'
    ];
}
