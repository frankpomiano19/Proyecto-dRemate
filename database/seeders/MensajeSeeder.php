<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensajes')->insert(['men_mensaje'=>"Mijole voy a comprar ese producto wey",'men_asunto'=>'Negociar el producto','use_id_emisor'=>2,'use_id_receptor'=>1,'pro_id'=>2]);
        DB::table('mensajes')->insert(['men_mensaje'=>"Orale wey quiero ese producto",'men_asunto'=>'Contactame','use_id_emisor'=>2,'use_id_receptor'=>1,'pro_id'=>12]);

    }
}
