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
        Schema::create('crm_beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('parentesco');
            $table->date('fecha_nacimiento');
            $table->double('porcentaje', 3, 2);
            $table->text('direccion', 500);
            $table->unsignedBigInteger('crm_socio_id');

            $table->foreign('crm_socio_id')
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
        Schema::dropIfExists('crm_beneficiarios');
    }
};
