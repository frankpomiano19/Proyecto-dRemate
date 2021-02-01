<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(4)->create();
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(comentSeeder::class);
        $this->call(MensajeSeeder::class);
        $this->call(HelpSeeder::class);
        //$this->call(PujaSeeder::class);
    }

}
