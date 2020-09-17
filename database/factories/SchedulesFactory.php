<?php

namespace Database\Factories;

use App\Models\Schedules;
use App\Models\Screens;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class SchedulesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedules::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listScreen = [];
        $listTheater = [];
        $start = Carbon::createFromTimestamp($this->faker->dateTimeBetween($startDate = '+1 days', $endDate = '+2 days')->getTimeStamp()) ;
        $end= Carbon::createFromFormat('Y-m-d H:i:s', $start)->addHours(2);

        $theater_id_list = Screens::select('theater_id')->groupBy('theater_id')->get();
        foreach ($theater_id_list as $valueTheater) {
          array_push($listTheater, $valueTheater['theater_id']);
        }

        $theaterId = $this->faker->randomElement($listTheater);

        $screen_id_list = Screens::select('id')->where('theater_id', $theaterId)->get();
        foreach ($screen_id_list as $valueScreen) {
          array_push($listScreen, $valueScreen['id']);
        }


        return [
          'theater_id' => $theaterId,
          'screen_id' => $this->faker->randomElement($listScreen),
          'movie_id' => $this->faker->numberBetween($min=1, $max=4),
          'start' => $start,
          'end' => $end,
        ];
    }
}
