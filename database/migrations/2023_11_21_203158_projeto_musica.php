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
        Schema::create('projeto_musica', function (Blueprint $table) {
            $table->id('id_projeto_musica');
            $table->unsignedBigInteger('id_projeto');
            $table->foreign('id_projeto')->references('id_projeto')->on('projeto_musical');
            $table->unsignedBigInteger('id_musica');
            $table->foreign('id_musica')->references('id_musica')->on('musica');
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
        //
    }
};
