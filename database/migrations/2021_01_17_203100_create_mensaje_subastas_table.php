<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajeSubastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_subastas', function (Blueprint $table) {
            $table->id();
            $table->text("men_sub_mensaje");
            $table->integer('like')->unsigned()->default(0);
            $table->integer('dislike')->unsigned()->default(0);
            $table->unsignedBigInteger('us_emisor');
            $table->unsignedBigInteger('us_receptor');
            $table->unsignedBigInteger('pro_id');
            // $table->unsignedBigInteger('resp_id');
            $table->foreign('us_emisor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('us_receptor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pro_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('resp_id')->references('mensub_resp')->on('mensub_respuestas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mensaje_subastas');
    }
}
