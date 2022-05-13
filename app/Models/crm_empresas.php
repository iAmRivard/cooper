<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crm_empresas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'actual',
        'crm_socio_id'
    ];

    public function socio()
    {
        return $this->belongsTo(Crm_socios::class, 'crm_socio_id');
    }
}
