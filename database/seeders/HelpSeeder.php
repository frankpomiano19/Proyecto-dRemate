<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('helps')->insert(['us_id'=>1,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('helps')->insert(['us_id'=>2,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('helps')->insert(['us_id'=>3,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('helps')->insert(['us_id'=>4,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('helps')->insert(['us_id'=>5,'created_at'=>now(),'updated_at'=>now()]);
    }
}
