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
        Schema::create('membros_projeto', function (Blueprint $table) {
            $table->id('memb_id');
            $table->unsignedBigInteger('id_projeto');
            $table->foreign('id_projeto')->references('id_projeto')->on('projeto_musical')->onDelete('cascade');
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
