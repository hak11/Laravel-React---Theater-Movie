<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedules;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedules::factory()->count(50)->create();
    }
}
