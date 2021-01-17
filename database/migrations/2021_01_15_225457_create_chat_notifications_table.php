<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('us_envia');
            $table->unsignedBigInteger('us_recibe');
            $table->unsignedBigInteger('pro_id');
            $table->boolean('confirmed');//True para pelido, False para no leido
            $table->foreign('us_envia')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('us_recibe')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('chat_notifications');
    }
}
