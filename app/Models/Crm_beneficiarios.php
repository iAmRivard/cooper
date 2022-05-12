<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm_beneficiarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'parentesco',
        'fecha_nacimiento',
        'porcentaje',
        'direccion',
        'crm_socio_id'
    ];

    public function socio()
    {
        return $this->belongsTo(Crm_socios::class, 'crm_socio_id');
    }
}
