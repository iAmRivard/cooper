<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'porcentaje_interes',
        'descripcion',
        'estado'
    ];

    public function movimiento()
    {
        return $this->belongsTo(CreditoDet::class, 'tipo_movimiento_credito_id');
    }
}
