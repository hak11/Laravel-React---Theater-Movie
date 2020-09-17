<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Schedules;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class MoviesController extends Controller
{

    public function index()
    {
      $dataMovies = Movies::simplePaginate(5);
      return response($dataMovies);
    }

    public function show($id, Request $request)
    {
      $validator = Validator::make($request->all(), [
        'city' => 'required',
        'movieStart' => 'required|date'
      ]);

      if ($validator->fails()) {
        return response(['errors' => $validator->errors()], 422);
      }

      $start = Carbon::parse($request->movieStart)->startOfDay();
      $end = Carbon::parse($request->movieStart)->add(3, 'day')->endOfDay();
      $dataMovie = Movies::find($id);
      $dataSchedules = Schedules::where('movie_id', $id)
      ->whereBetween('start', [$start, $end])
      ->with('theater','screen')
      ->whereHas('theater', function ($query) use ($request) {
        $query->where('city', '=', $request->city);
      })
      ->get()->toArray();

      foreach ($dataSchedules as $key => $dataSchedule ) {
        $dataSchedules[$key]['max_seat'] = $dataSchedules[$key]['screen']['max_seats_row'] * $dataSchedules[$key]['screen']['max_seats_colom'];
        $dataSchedules[$key]['booked_seat'] = Transactions::where('schedule_id',  $dataSchedule['id'])->count();
      }

      $dataMovie['schedule'] = $dataSchedules;

      return response($dataMovie);
    }

    public function schedule_movies(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'city' => 'required',
      ]);

      if ($validator->fails()) {
        return response(['errors' => $validator->errors()], 422);
      }

      $listMovieWithDetail = [];
      $from = Carbon::now()->startOfDay();
      $to = Carbon::now()->add(3, 'day')->endOfDay();
      $dataMovie = Schedules::select('movie_id')->whereBetween('start', [$from, $to])
        ->whereHas('screen.theater', function ($query) use ($request) {
          $query->where('city', '=', $request->city);
        })
        ->orderBy('schedules.movie_id', 'asc')
        ->groupBy('movie_id')
        ->get();

      foreach ($dataMovie as $value) {
        $detailMovie = Movies::find($value['movie_id']);
        $listMovieWithDetail[] = [
          'movie_id' => $value['movie_id'],
          'title' => $detailMovie->title,
          'image' => $detailMovie->image,
          'description' => $detailMovie->description,
        ];
      }

      return response($listMovieWithDetail);
    }
}
