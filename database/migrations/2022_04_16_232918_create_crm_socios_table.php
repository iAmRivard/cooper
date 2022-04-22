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
        Schema::create('crm_socios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dui', 9);
            $table->string('nit', 14)->nullabe();
            $table->text('direccion');
            $table->text('correo');
            $table->decimal('salario');
            $table->boolean('estado');
            // $table->dateTime('fecha_creacion');
            // $table->dateTime('fecha_actualizacion');
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
        Schema::dropIfExists('crm_socios');
    }
};
