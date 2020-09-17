<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Screens;

class ScreensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Screens::factory()->count(20)->create();
    }
}
