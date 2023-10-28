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
        Schema::create('feed_atividades', function (Blueprint $table) {
            $table->id('ativ_id');
            $table->string('descricao')->unique();
            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('usr_id')->on('users');
            $table->timestamps();
            $table->unsignedBigInteger('arq_id');

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
