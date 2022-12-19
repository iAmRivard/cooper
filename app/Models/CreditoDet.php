<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class CreditoDet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'credito_id',
        'socio_id',
        'tipo_movimiento_credito_id',
        'monto',
        'descripcion'
    ];

    public function socio()
    {
        return $this->belongsTo(Crm_socios::class, 'socio_id');
    }

    public function credito()
    {
        return $this->belongsTo(TipoCredito::class, 'credito_id');
    }

    public function tipoMovimiento()
    {
        return $this->belongsTo(TipoMovimientoCredito::class, 'tipo_movimiento_credito_id');
    }
}
