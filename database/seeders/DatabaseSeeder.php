<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        $this->call(Crc_tipos_cuentasSeeder::class);

        $this->call(Crc_topos_de_movimientoSeeder::class);

        $this->call(TipoCreditoSeeder::class);

        $this->call(TipoMovimientoCreditoSeeder::class);
        $this->call(EmpresasSeeder::class);
    }
}
