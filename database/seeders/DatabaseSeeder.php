<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        \App\Models\Games::factory(10)->create();
        \App\Models\Locations::factory(100)->create();
        \App\Models\Tasks::factory(1000)->create();
    }
}
