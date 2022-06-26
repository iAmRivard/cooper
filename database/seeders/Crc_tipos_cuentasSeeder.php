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
            'nombre' => 'Cuenta Ejemplo',
            'descripcion' => 'Cuenta Ejemplo, para hacer cruds',
            'estado' => true,
            'porcentaje' => 3,
        ]);
    }
}
