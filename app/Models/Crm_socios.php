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
    ];

    public function cuentas()
    {
        return $this->hasMany(Ctr_cuenta::class, 'crm_socio_id');
    }

}
