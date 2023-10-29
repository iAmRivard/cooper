<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoMovimientoCredito;

class TipoMovimientoCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMovimientoCredito::create([
            'nombre' => 'APERTURA CREDITO',
            //      'descripcion' => 'Por apertura de crédito',
            'naturaleza' => 1
        ]);

        TipoMovimientoCredito::create([
            'nombre' => 'ABONO CREDITO',
            //      'descripcion' => 'Pago de crédito',
            'naturaleza' => 0
        ]);

        TipoMovimientoCredito::create([
            'nombre' => 'GENERACION DE INTERESES',
            //      'descripcion' => 'Generación de intereses del crédito',
            'naturaleza' => 1
        ]);

        TipoMovimientoCredito::create([
            'nombre' => 'AJUSTE DE ABONO',
            //      'descripcion' => 'Por ajuste de abono de crédito',
            'naturaleza' => 1
        ]);

        TipoMovimientoCredito::create([
            'nombre' => 'AJUSTE DE CARGO',
            //     'descripcion' => 'Por ajuste de cargo de crédito',
            'naturaleza' => 0
        ]);
    }
}
