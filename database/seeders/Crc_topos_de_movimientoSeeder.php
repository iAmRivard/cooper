<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Crc_tipos_de_movimiento;

class Crc_topos_de_movimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crc_tipos_de_movimiento::create([
            'nombre' => 'Apertura de cuenta',
            'descripcion' => 'Apertura de cuetna',
            'naturaleza' => 1
        ]);

        Crc_tipos_de_movimiento::create([
            'nombre' => 'Abono a cuenta',
            'descripcion' => 'Abono a cuenta de socio',
            'naturaleza' => 1
        ]);

        Crc_tipos_de_movimiento::create([
            'nombre' => 'Retiro de cuenta',
            'descripcion' => 'Retiro de efectido de cuenta se socio',
            'naturaleza' => 0
        ]);
    }
}
