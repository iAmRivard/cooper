<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctr_cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_cuenta',
        'crm_socio_id',
        'crc_topo_cuenta_id',
        'saldo_actual',
        'estado',
    ];

    public function socio()
    {
        // return $this->belongsTo('App\Models\crm_socios', 'crm_socio_id');
        return $this->belongsTo(Crm_socios::class, 'crm_socio_id');
    }
}
