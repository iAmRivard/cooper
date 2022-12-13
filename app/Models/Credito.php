<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'socio_id',
        'tipo_credito_id',
        'monto',
        'saldo_actual',
        'porcentaje_interes',
        'estado',
        'cantidad_cuotas',
        'cuota_actual',
        'no_cuenta'
    ];

    public function socio()
    {
        return $this->belongsTo(Crm_socios::class, 'socio_id');
    }

    public function tipoCredito()
    {
        return $this->belongsTo(TipoCredito::class, 'tipo_credito_id');
    }

    public function detalles()
    {
        return $this->hasMany(CreditoDet::class, 'credito_id');
    }

    /**
     * Get all of the comments for the CreditoDet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planPago()
    {
        return $this->hasMany(CrtPlanPago::class, 'credito_id', 'id');
    }

    public function cuotaFija()
    {
        return $this->hasMany(CrtPlanPago::class, 'credito_id', 'id')->first();
    }

    /**
     * Get all of the comments for the Credito
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(CrtPlanPago::class, 'credito_id', 'id');
    }
}
