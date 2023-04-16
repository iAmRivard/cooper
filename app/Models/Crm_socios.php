<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_socios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'dui',
        'nit',
        'direccion',
        'salario',
        'correo',
        'estado',
        'aportacion',
        'user_id',
        'codigo_empleado',
        'empresa_id',
        'numero_socio'
    ];

    public function cuentas()
    {
        return $this->hasMany(Ctr_cuenta::class, 'crm_socio_id');
    }

    public function creditos()
    {
        return $this->hasMany(Credito::class, 'socio_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function beneficiarios()
    {
        return $this->hasMany(Crm_beneficiarios::class, 'crm_socio_id');
    }

    public function empresas()
    {
        return $this->hasMany(crm_empresas::class, 'crm_socio_id');
    }

    public function empresa()
    {
        return $this->belongsTo(crm_empresas::class, 'empresa_id');
    }

}
