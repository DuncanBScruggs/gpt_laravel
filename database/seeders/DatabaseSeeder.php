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

        \App\Models\Author::factory(12)->create();
        \App\Models\Book::factory(12)->create();
        \App\Models\User::factory(12)->create();
        \App\Models\Checkout::factory(12)->create();
    }
}
