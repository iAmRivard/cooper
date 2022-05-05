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
        Schema::create('crc_tipos_de_movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');

            /**
             * 1 = Acreedora
             * 2 = deudora
             */
            $table->boolean('naturaleza');
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
        Schema::dropIfExists('crc_tipos_de_movimientos');
    }
};
