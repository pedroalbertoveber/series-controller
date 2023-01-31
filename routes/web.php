<?php

use App\Http\Controllers\SeasonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return to_route('serie.index');
});

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');