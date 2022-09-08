<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crc_tipos_de_movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'naturaleza'
    ];

    public function movimiento()
    {
        return $this->belongsTo(Ctr_cuenta_det::class, 'id_tipo_movimiento');
    }
}
