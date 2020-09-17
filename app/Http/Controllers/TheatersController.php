<?php

namespace App\Http\Controllers;

use App\Models\Theaters;

class TheatersController extends Controller
{
    public function getCity()
    {
      $listOfCity = Theaters::select('city')
      ->groupBy('city')
      ->get();
      return response($listOfCity);
    }
}
