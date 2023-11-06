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
        Schema::create('crc_tipos_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->boolean('estado');
            $table->decimal('porcentaje', 5, 2);
            /**
             * Campo plazo
             * 1 = si tiene plazo
             * 0 = no tiene plazo la cuenta
             */
            $table->boolean('plazo');

            $table->boolean('aplica_monto')
                ->default(0)
                ->comment('APLICA PARA NAVIDEÑO/PROGRAMADOR QUE TIENEN DESCUENTOS QUINCENALES DE PLANILLA Y UN PLAZO DEFINIDO');
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
        Schema::dropIfExists('crc_tipos_cuentas');
    }
};
