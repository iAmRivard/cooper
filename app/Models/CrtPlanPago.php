<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CrtPlanPago extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'credito_id',
        'user_id',
        'pediodo_id',
        'socio_id',
        'monto',
        'cuota_fija',
        'interes_acumulado',
        'refinanciamiento',
        'vigente',
        'estado',
    ];

    public function credito()
    {
        return $this->belongsTo(Credito::class, 'credito_id', 'id');
    }
}
