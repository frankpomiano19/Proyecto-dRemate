<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre_categoria'=>'Tecnología']);
        DB::table('categorias')->insert(['nombre_categoria'=>'Hogar']);
        DB::table('categorias')->insert(['nombre_categoria'=>'Electrodomésticos']);
        DB::table('categorias')->insert(['nombre_categoria'=>'Joyas']);
        DB::table('categorias')->insert(['nombre_categoria'=>'Instrumento musical']);
    }
}
