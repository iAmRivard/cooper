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
            $table->string('dui', 10)->unique();
            $table->string('nit', 17)->unique()->nullabe();
            $table->text('direccion');
            $table->string('correo')->unique();
            $table->decimal('salario');
            $table->boolean('estado');
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('crm_socios');
    }
};
