<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Models\Transactions;

class SchedulesController extends Controller
{

    public function show($id)
    {
      $seat = [];
      $dataSchedule = Schedules::with(
        'screen',
        'theater',
        'movie',
        )->find($id);

      $seatRow = $dataSchedule->screen->max_seats_row;
      $seatCol = $dataSchedule->screen->max_seats_colom;

      // making seat
      for ($row=0; $row < $seatRow; $row++) {
        for ($col=0; $col < $seatCol; $col++) {
          $seat[$row][$col] = true;
        }
      }

      $availableSeats = Transactions::where('schedule_id', $id)->get();
      foreach ($availableSeats as $availableSeat) {
        $seat[$availableSeat['seats_row']-1][$availableSeat['seats_colom']-1] = false;
      }

      $dataSchedule['seat'] = $seat;
      $dataSchedule['max_seat'] = $seatRow * $seatCol;
      $dataSchedule['booked_seat'] = $availableSeats->count();
      return response($dataSchedule);
    }
}
