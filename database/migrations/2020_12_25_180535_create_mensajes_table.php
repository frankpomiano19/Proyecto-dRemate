<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->text('men_mensaje');
            $table->text('men_asunto');
            $table->unsignedBigInteger('use_id_emisor');
            $table->unsignedBigInteger('use_id_receptor');
            $table->unsignedBigInteger('pro_id');
            $table->foreign('use_id_emisor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('use_id_receptor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pro_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mensajes');
    }
}
