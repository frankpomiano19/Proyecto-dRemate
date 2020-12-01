<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class comentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert(['com_texto'=>'Mi opinion es la siguiente, sin nada mas que decir','com_like'=>12,'com_dislike'=>2,'com_editado'=>0,'use_id'=>1,'use_idComentarios'=>3,'created_at'=>'2020-11-25 18:47:00']);
        DB::table('comentarios')->insert(['com_texto'=>'Tengo Otra opinion','com_like'=>5,'com_dislike'=>1,'com_editado'=>0,'use_id'=>1,'use_idComentarios'=>2,'created_at'=>'2020-11-26 18:47:00']);
        DB::table('comentarios')->insert(['com_texto'=>'Hablando de algo adicional, sin nada mas que decir','com_like'=>9,'com_dislike'=>2,'com_editado'=>0,'use_id'=>2,'use_idComentarios'=>3,'created_at'=>'2020-11-22 18:47:00']);
        DB::table('comentarios')->insert(['com_texto'=>'Solo uno a la vez estar caminando, sin nada mas que decir','com_like'=>11,'com_dislike'=>2,'com_editado'=>0,'use_id'=>1,'use_idComentarios'=>1,'created_at'=>'2020-11-30 18:47:00']);
    }
}
