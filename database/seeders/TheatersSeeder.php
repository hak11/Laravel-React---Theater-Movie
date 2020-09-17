<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theaters;

class TheatersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theaters::factory()->count(20)->create();
    }
}
