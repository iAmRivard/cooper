<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crc_tipos_cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'plazo'
    ];

    public function cuentas()
    {
        return $this->hasMany(Ctr_cuenta::class, 'crc_topo_cuenta_id');
    }
}
