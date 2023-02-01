<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return to_route('series.index');
});

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');