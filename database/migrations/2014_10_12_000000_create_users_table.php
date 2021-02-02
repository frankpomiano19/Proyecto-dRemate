<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->double('us_din')->nullable();
            $table->string('us_descp')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nombres',50)->nullable();
            $table->string('apellidos',50)->nullable();
            $table->string('telefono',30)->nullable();
            $table->date('fechadenacimiento')->nullable();
            $table->string('suscripcion')->nullable();
            $table->integer('visita')->nullable()->default(0);

            $table->string('departamento')->nullable();
            $table->string('distrito')->nullable();
            $table->integer('subastas')->nullable()->default(0);
            
            $table->string('us_youtube',50)->nullable();
            $table->string('us_facebook',50)->nullable();
            $table->string('us_twitter',30)->nullable();
            $table->text('favoritos')->nullable();
            $table->string('us_twitch')->nullable();
            $table->text('notificaciones')->nullable();
            $table->string('password');
            $table->string('us_direc')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
