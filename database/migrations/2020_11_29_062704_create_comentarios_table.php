<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('com_texto');
            $table->integer('com_like')->nullable();
            $table->integer('com_dislike')->nullable();
            $table->integer('com_editado')->nullable();
            $table->text('com_idLike')->nullable();
            $table->text('com_idDislike')->nullable();

            $table->unsignedBigInteger('use_id');//Aca se coloca al perfil que pertenece
            $table->foreign('use_id')->references('id')->on('users');
            $table->unsignedBigInteger('use_idComentarios');//Aca se coloca a diferentes comentarios a dicho perfil
            $table->foreign('use_idComentarios')->references('id')->on('users');
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
        Schema::dropIfExists('comentarios');
    }
}
