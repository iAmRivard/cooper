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
            $table->decimal('monto');
            $table->decimal('cuota_fija');
            $table->decimal('interes_acumulado');
            $table->boolean('refinanciamiento')->nullable();
            $table->boolean('vigente');
            $table->boolean('estado');

            $table->foreign('credito_id')
                    ->references('id')->on('creditos');

            $table->foreign('user_id')
                    ->references('id')->on('users');
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
        Schema::dropIfExists('crt_plan_pagos');
    }
};
