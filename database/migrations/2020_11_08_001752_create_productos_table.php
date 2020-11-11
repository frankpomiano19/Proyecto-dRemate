<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->id();
            //Primer Formulario
            $table->string('nombre_producto');
            $table->text('descripcion');
            $table->unsignedBigInteger('categoria_id');
            $table->string('estado');
            $table->string('condicion');
            $table->string('imagen');
            $table->string('garantia');

            //Segundo Formulario
            $table->string('precio_inicial');
            $table->dateTime('inicio_subasta');
            $table->dateTime('final_subasta');
            $table->unsignedBigInteger('user_id');
    	    $table->foreign('categoria_id')->references('id')->on('categorias');	
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
