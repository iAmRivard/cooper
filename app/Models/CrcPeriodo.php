<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrcPeriodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'descripcion',
        'estado',
        'user_id'
    ];
}
