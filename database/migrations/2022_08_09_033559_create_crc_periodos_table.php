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
        Schema::create('crc_periodos', function (Blueprint $table) {
            $table->id();
            $table->integer('valor');
            $table->string('descripcion');
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
        Schema::dropIfExists('crc_periodos');
    }
};
