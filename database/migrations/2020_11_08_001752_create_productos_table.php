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
            $table->string('condicion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('image_name1')->nullable();
            $table->string('image_name2')->nullable();
            $table->string('image_name3')->nullable();
            $table->string('image_name4')->nullable();
            $table->string('garantia')->nullable();
            $table->string('ubicacion');
            $table->string('distrito')->nullable();


            //Segundo Formulario
            $table->float('precio_inicial')->nullable();
            $table->float('ultima_puja')->nullable();
            $table->float('latitud')->nullable();
            $table->float('longitud')->nullable();
            $table->integer('indicador')->nullable();

            $table->dateTime('inicio_subasta')->nullable();
            $table->dateTime('final_subasta')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_id_comprador')->nullable();
    	    $table->foreign('categoria_id')->references('id')->on('categorias');	
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_id_comprador')->references('id')->on('users');
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
