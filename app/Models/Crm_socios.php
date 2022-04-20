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
        'fecha_creacion',
        'fecha_actualizacion'
    ];
}
