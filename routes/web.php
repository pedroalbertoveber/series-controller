<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return to_route('serie.index');
});

Route::resource('/series', SeriesController::class)
    ->except(['show']);