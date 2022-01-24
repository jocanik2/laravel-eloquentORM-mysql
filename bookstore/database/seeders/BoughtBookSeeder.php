<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BoughtBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BoughtBook::factory(30)->create();

    }
}
