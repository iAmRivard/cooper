<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Crm_socios;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        // $this->call(Crm_SociosSeeder::class);

        $this->call(Crc_tipos_cuentasSeeder::class);

        $this->call(Crc_topos_de_movimientoSeeder::class);

        Crm_socios::factory(1)->create();
    }
}
