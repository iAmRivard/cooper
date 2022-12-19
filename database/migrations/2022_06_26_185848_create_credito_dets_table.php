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
        Schema::create('credito_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credito_id');
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('tipo_movimiento_credito_id');
            $table->decimal('monto');
            $table->text('descripcion');

            $table->foreign('credito_id')
                    ->references('id')->on('creditos');

            $table->foreign('socio_id')
                    ->references('id')->on('crm_socios');

            $table->foreign('tipo_movimiento_credito_id')
                    ->references('id')->on('tipo_movimiento_creditos');

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
        Schema::dropIfExists('credito_dets');
    }
};
