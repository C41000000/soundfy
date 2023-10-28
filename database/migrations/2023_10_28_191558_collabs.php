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
        Schema::create('conexoes', function (Blueprint $table) {
            $table->id('conexoes_id');
            $table->unsignedBigInteger('id_conexao');
            $table->foreign('id_conexao')->references('id_conexao')->on('conexao')->onDelete('cascade');
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
