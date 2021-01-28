<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
          
           
            $table->unsignedBigInteger('use_ids');//Aca se coloca al perfil que pertenece
            $table->foreign('use_ids')->references('id')->on('users');
            $table->unsignedBigInteger('use_idc');//Aca se coloca al perfil que pertenece
            $table->foreign('use_idc')->references('id')->on('users');
            $table->primary(array('use_ids', 'use_idc'));
            $table->integer('score');
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
        Schema::dropIfExists('votes');
    }
}
