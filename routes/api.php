<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\TheatersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 // movies
Route::get('/movies', [MoviesController::class, 'index']);
Route::post('/movie/{id}', [MoviesController::class, 'show']);
Route::post('/movies/nowPlaying', [MoviesController::class, 'schedule_movies']);

 // theater
Route::get('/theater/listOfCity', [TheatersController::class, 'getCity']);

// schedule
Route::get('/schedule/{id}', [SchedulesController::class, 'show']);
