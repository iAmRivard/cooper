<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Crc_tipos_cuenta;

class Crc_tipos_cuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Crc_tipos_cuenta::create([
            'nombre'        => 'APORTACION',
            'descripcion'   => 'Cuenta de aportacion',
            'estado'        => true,
            'porcentaje'    => 3.5,
            'plazo'         => 0,
        ]);

        Crc_tipos_cuenta::create([
            'nombre'        => 'VISTA',
            'descripcion'   => 'Ahorro a la vista',
            'estado'        => true,
            'porcentaje'    => 3.5,
            'plazo'         => 0,
        ]);

        Crc_tipos_cuenta::create([
            'nombre'        => 'NAVIDEÑO',
            'descripcion'   => 'Ahorro navideño',
            'estado'        => true,
            'porcentaje'    => 5,
            'plazo'         => 1,
        ]);

        Crc_tipos_cuenta::create([
            'nombre'        => 'PROGRAMADO',
            'descripcion'   => 'Ahorro programado',
            'estado'        => true,
            'porcentaje'    => 5,
            'plazo'         => 1,
        ]);


        Crc_tipos_cuenta::create([
            'nombre'        => 'PLAZO I',
            'descripcion'   => '6% para monto mínimo de $500 y máximo de $2000 con plazo mínimo de 12 meses.',
            'estado'        => true,
            'porcentaje'    => 6,
            'plazo'         => 1,
        ]);

        Crc_tipos_cuenta::create([
            'nombre'        => 'PLAZO II',
            'descripcion'   => '7.5% para monto mínimo de $ 1000 y máximo de 4000 con plazo mínimo de 24 meses',
            'estado'        => true,
            'porcentaje'    => 7.5,
            'plazo'         => 1,
        ]);

        Crc_tipos_cuenta::create([
            'nombre'        => 'PLAZO III',
            'descripcion'   => '9% para montos de 3000 en adelante y un plazo mínimo de 36 meses.',
            'estado'        => true,
            'porcentaje'    => 9,
            'plazo'         => 1,
        ]);
    }
}
