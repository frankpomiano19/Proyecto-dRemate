<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNuevopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuevops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->decimal('precio_inicial', 6, 2);
            $table->dateTime('fecha');
            $table->string('categoria');
            $table->string('estado');
            $table->string('devoluciones');
            $table->string('foto');
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
        Schema::dropIfExists('nuevops');
    }
}
