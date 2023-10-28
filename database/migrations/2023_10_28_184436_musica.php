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
        Schema::create('musica', function (Blueprint $table) {
            $table->id('id_musica');
            $table->string('titulo');
            $table->integer('id_genero');
            $table->timestamps();
            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('usr_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
