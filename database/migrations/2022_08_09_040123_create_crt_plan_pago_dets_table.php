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
        Schema::create('crt_plan_pago_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_pago_id');
            $table->unsignedBigInteger('credito_id');
            $table->unsignedBigInteger('socio_id');
            $table->decimal('cuota');
            $table->decimal('interes');
            $table->decimal('interes_acumulado');
            $table->decimal('total');
            $table->timestamp('fecha_programada');
            $table->boolean('estado');

            $table->foreign('plan_pago_id')
                    ->references('id')->on('crt_plan_pagos');

            $table->foreign('credito_id')
                    ->references('id')->on('creditos');

            $table->foreign('socio_id')
                    ->references('id')->on('crm_socios');

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
        Schema::dropIfExists('crt_plan_pago_dets');
    }
};
