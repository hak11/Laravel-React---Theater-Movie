<?php

namespace Database\Factories;

use App\Models\Screens;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScreensFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Screens::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'theater_id' => $this->faker->numberBetween($min = 1, $max = 20),
          'name' => $this->faker->lastname,
          'max_seats_row' => $this->faker->randomElement([8,9,10]),
          'max_seats_colom' => $this->faker->randomElement([11,12,13]),
        ];
    }
}
