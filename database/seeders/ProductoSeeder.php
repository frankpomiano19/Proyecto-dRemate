<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('productos')->insert(['nombre_producto'=>'Cuadro de picaso','descripcion'=>'Cuadro de picaso, lo tengo porque soy familiar de picaso 100% seguro, fijense en las imagenes','precio_inicial'=>30.2,'imagen'=>'http://imgfz.com/i/ghJeXZQ.jpeg','estado'=>'Disponible','user_id'=>1,'categoria_id'=>2]);
        DB::table('productos')->insert(['nombre_producto'=>'Mazo de oro 1996','descripcion'=>'Maso hecho de oro 100% oro','precio_inicial'=>1990.0,'imagen'=>'http://imgfz.com/i/6baLGPT.jpeg','estado'=>'No disponible','user_id'=>1,'categoria_id'=>1]);
        DB::table('productos')->insert(['nombre_producto'=>'Libro de servantes(original)','descripcion'=>'Libro original de Servantes, lo vendo porque necesito espacio en mi casa','precio_inicial'=>100.2,'imagen'=>'http://imgfz.com/i/uGhDcmr.jpeg','estado'=>'Disponible','user_id'=>2,'categoria_id'=>2]);
        DB::table('productos')->insert(['nombre_producto'=>'Cuadro de picaso','descripcion'=>'Cuadro de picaso, lo tengo porque soy familiar de picaso 100% seguro, fijense en las imagenes','precio_inicial'=>30.2,'imagen'=>'http://imgfz.com/i/WVCnYNe.jpeg','estado'=>'En curso','user_id'=>1,'categoria_id'=>2]);
        DB::table('productos')->insert(['nombre_producto'=>'Mazo de oro 1996','descripcion'=>'Maso hecho de oro 100% oro','precio_inicial'=>1990.0,'imagen'=>'http://imgfz.com/i/g7Alfst.jpeg','estado'=>'En curso','user_id'=>1,'categoria_id'=>1]);
        DB::table('productos')->insert(['nombre_producto'=>'Libro de servantes(original)','descripcion'=>'Libro original de Servantes, lo vendo porque necesito espacio en mi casa','precio_inicial'=>100.2,'imagen'=>'http://imgfz.com/i/bEdwRlf.jpeg','estado'=>'En curso','user_id'=>2,'categoria_id'=>2]);
        DB::table('productos')->insert(['nombre_producto'=>'Mazo de oro 1996','descripcion'=>'Maso hecho de oro 100% oro','precio_inicial'=>1990.0,'imagen'=>'http://imgfz.com/i/vrnLG64.jpeg','estado'=>'En curso','user_id'=>1,'categoria_id'=>1]);
        DB::table('productos')->insert(['nombre_producto'=>'Libro de servantes(original)','descripcion'=>'Libro original de Servantes, lo vendo porque necesito espacio en mi casa','precio_inicial'=>100.2,'imagen'=>'http://imgfz.com/i/Qvz10x7.png','estado'=>'En curso','user_id'=>2,'categoria_id'=>2]);
    }
}
