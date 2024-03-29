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
        Schema::create('crt_plan_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credito_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('pediodo_id');
            $table->decimal('monto');
            $table->decimal('cuota_fija');
            $table->decimal('interes_acumulado')->nullable();
            $table->boolean('refinanciamiento')->nullable();
            $table->boolean('vigente');
            $table->boolean('estado');

            $table->foreign('credito_id')
                    ->references('id')->on('creditos');

            $table->foreign('socio_id')
                    ->references('id')->on('crm_socios');

            $table->foreign('pediodo_id')
                    ->references('id')->on('crc_periodos');

            $table->foreign('user_id')
                    ->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crt_plan_pagos');
    }
};
