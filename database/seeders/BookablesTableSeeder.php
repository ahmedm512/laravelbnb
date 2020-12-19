<?php

namespace Database\Seeders;

use App\Models\Bookables;
//use FactoryMethod;
use Illuminate\Database\Seeder;

class BookablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookables::factory()
            ->times(100)
            ->create();
    }
}
