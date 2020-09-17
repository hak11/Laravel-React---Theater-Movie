<?php

namespace Database\Factories;

use App\Models\Theaters;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheatersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theaters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->lastName,
          'city' => $this->faker->randomElement(['JAKARTA','BEKASI','BANDUNG']),
          'location' => $this->faker->address,
        ];
    }
}
