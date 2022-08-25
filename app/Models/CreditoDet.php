<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditoDet extends Model
{
    use HasFactory;

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

    public function tipo()
    {
        return $this->belongsTo(TipoCredito::class, 'tipo_movimiento_credito_id');
    }

}
