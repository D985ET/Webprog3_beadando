<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create(); //le generál 10 db felhasználót

        $this->call(TopicsTableSeeder::class);//meghívjuk a TopicsTableSeedert
    }
}
