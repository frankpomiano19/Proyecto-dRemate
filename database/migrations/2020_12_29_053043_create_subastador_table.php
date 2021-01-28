<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubastadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subastador', function (Blueprint $table) {
            $table->id();
            $table->integer('numvotos');
            $table->integer('totalscore');
            $table->double('rating');
            $table->unsignedBigInteger('use_idSub');
            $table->foreign('use_idSub')->references('id')->on('users');
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
        Schema::dropIfExists('subastador');
    }
}
