<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoCredito;
class TipoCreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCredito::create([
            'nombre'        => 'ORDINARIO',
            'descripcion'   => 'Crédito Ordinario',
            'estado'        => true,
            'porcentaje_interes'    => 3.5,
        ]);

        TipoCredito::create([
            'nombre'        => 'EXTRA-ORDINARIO',
            'descripcion'   => 'Crédito Extra Ordinario',
            'estado'        => true,
            'porcentaje_interes'    => 3.5,
        ]);

        TipoCredito::create([
            'nombre'        => 'CONSUMO',
            'descripcion'   => 'Crédito de Consumo ',
            'estado'        => true,
            'porcentaje_interes'    => 3.5,
        ]);

        TipoCredito::create([
            'nombre'        => 'ESPECIALES',
            'descripcion'   => 'Crédito Especial',
            'estado'        => true,
            'porcentaje_interes'    => 3.5,
        ]);

    }
}
