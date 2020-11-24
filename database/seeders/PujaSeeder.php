<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PujaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('pujas')->insert(['usuario'=>'perrovaca','us_din'=>20,'us_descp'=>'Ninguna','email'=>'valor@asdaw.com','email_verified_at'=>now(),'password'=>Hash::make('perrovaca'),'remember_token' => Str::random(10)]);
        DB::table('users')->insert(['usuario'=>'mantecoso','us_din'=>10,'us_descp'=>'Ninguna','email'=>'valoasr@asdawx.com','email_verified_at'=>now(),'password'=>Hash::make('mantecoso'),'remember_token' => Str::random(10)]);
        DB::table('users')->insert(['usuario'=>'vacancia','us_din'=>20,'us_descp'=>'Ninguna','email'=>'cavalor@aasdaw.com','email_verified_at'=>now(),'password'=>Hash::make('vacancia'),'remember_token' => Str::random(10)]);
        DB::table('users')->insert(['usuario'=>'merino','us_din'=>0,'us_descp'=>'Ninguna','email'=>'merino@asdawx.com','email_verified_at'=>now(),'password'=>Hash::make('merino'),'remember_token' => Str::random(10)]);


    }
}
