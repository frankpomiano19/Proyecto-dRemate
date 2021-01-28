<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensubRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensub_respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mensub_resp')->nullable();
            $table->text('mensub_resp_texto')->nullable();
            $table->unsignedBigInteger('us_response')->nullable();
            $table->foreign('mensub_resp')->references('id')->on('mensaje_subastas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('us_response')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mensub_respuestas');
    }
}
