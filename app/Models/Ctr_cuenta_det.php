<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctr_cuenta_det extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_movimiento_id',
        'concepto',
        'monto',
        'ctr_cuentas_id',
        'naturaleza'
    ];

    public function cuenta()
    {
        return $this->belongsTo(Ctr_cuenta::class, 'ctr_cuentas_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Crc_tipos_de_movimiento::class, 'tipo_movimiento_id');
    }

    // public function tipos()
    // {
    //     return $this->hasMany(Crc_tipos_de_movimiento::class, 'tipo_movimiento_id');
    // }
}
