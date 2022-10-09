<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Crm_socios;

class Crm_SociosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crm_socios::Create([
            'nombres' => 'Diego Antonio',
            'apellidos' => 'Garcia Rivas',
            'dui' => '00000000-0',
            'direccion' => 'asdasdasdasadasd',
            'salario' => 460,
            'estado' => true,
            'correo' => 'example@example.com',
            'fecha_creacion' => Carbon::today(),
            'fecha_actualizacion' => Carbon::today(),
            'codigo_empleado'   =>  Str::random(10),
        ]);
    }
}
