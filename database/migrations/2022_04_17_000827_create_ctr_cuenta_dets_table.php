<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctr_cuenta_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_movimiento_id');
            $table->unsignedBigInteger('ctr_cuentas_id');

            $table->text('concepto', 500);
            $table->decimal('monto', 14, 2);

            /**
             * Naturaleza = tipo : infreso ? egreso
             * Ingreso = 1
             * Egreso = 0
             */
            $table->boolean('naturaleza');

            $table->foreign('tipo_movimiento_id')
                    ->references('id')->on('crc_tipos_de_movimientos');

            $table->foreign('ctr_cuentas_id')
                    ->references('id')->on('ctr_cuentas');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctr_cuenta_dets');
    }
};
