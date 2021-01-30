<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('us_id');
            $table->boolean('help_home')->default(1);
            $table->boolean('help_subasta_rapida')->default(1);
            $table->boolean('help_infoPerfil')->default(1);
            $table->boolean('help_comentariosPerfil')->default(1);
            $table->boolean('help_subastaPujas')->default(1);
            $table->foreign('us_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('helps');
    }
}
