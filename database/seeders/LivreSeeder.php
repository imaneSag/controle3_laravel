<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre; // Add this line to import the Livre model

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Livre::factory(100)->create();
    }
}
