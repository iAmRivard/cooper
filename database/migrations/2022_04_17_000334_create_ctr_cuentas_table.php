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
        Schema::create('ctr_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('no_cuenta');
            $table->unsignedBigInteger('crm_socio_id');
            $table->unsignedBigInteger('crc_topo_cuenta_id');
            $table->decimal('saldo_actual');
            $table->boolean('estado');

            $table->decimal('monto_plazo')->unsigned()->nullable();
            $table->integer('cantidad_quincenas')->unsigned()->nullable();
            $table->integer('quincena_actual')->unsigned()->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->boolean('finalizado')->default(0);
            $table->decimal('pago_quincenal')->nullable();

            $table->foreign('crm_socio_id')
                ->references('id')->on('crm_socios');

            $table->foreign('crc_topo_cuenta_id')
                ->references('id')->on('crc_tipos_cuentas');
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
        Schema::dropIfExists('ctr_cuentas');
    }
};
