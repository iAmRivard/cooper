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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('tipo_credito_id');
            $table->decimal('monto', 5, 2);
            $table->decimal('saldo_actual', 5, 2);
            $table->decimal('porcentaje_interes', 5, 2);

            $table->foreign('socio_id')
                    ->references('id')->on('crm_socios');

            $table->foreign('tipo_credito_id')
                    ->references('id')->on('tipo_creditos');
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
        Schema::dropIfExists('creditos');
    }
};
