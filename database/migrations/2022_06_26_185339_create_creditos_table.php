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
            $table->decimal('monto', 14, 2);
            $table->decimal('saldo_actual', 14, 2);
            $table->decimal('porcentaje_interes', 5, 2);
            $table->boolean('estado');

            $table->foreign('socio_id')
                    ->references('id')->on('crm_socios');

            $table->foreign('tipo_credito_id')
                    ->references('id')->on('tipo_creditos');

            $table->unsignedBigInteger('cantidad_cuotas')->default(0);
            $table->unsignedBigInteger('cuota_actual')->default(0);
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
