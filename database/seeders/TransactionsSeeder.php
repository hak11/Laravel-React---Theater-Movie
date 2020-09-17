<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transactions;

use Faker\Factory as Faker;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i <= 100 ; $i++) {
        $faker = Faker::create('id_ID');

        $status_payment = $faker->randomElement(['pending', 'paid']);
        $status_redeem = $faker->randomElement([true, false]);
        if ($status_payment == 'pending') {
          $status_redeem = false;
        }

        $schedule_id = $faker->numberBetween(1, 9);
        $seats_row = $faker->numberBetween(1, 8);
        $seats_colom = $faker->numberBetween(1, 11);
        $checkAvailable = Transactions::where([
          'schedule_id' => $schedule_id,
          'seats_row' => $seats_row,
          'seats_colom' => $seats_colom,
        ])->first();

        if (!$checkAvailable) {
          Transactions::create([
            'schedule_id' => $schedule_id,
            'customer_id' => $faker->numberBetween(1, 30),
            'status_payment' => $status_payment,
            'status_redeem' => $status_redeem,
            'seats_row' => $seats_row,
            'seats_colom' => $seats_colom,
          ]);
        }
      }
    }
}
