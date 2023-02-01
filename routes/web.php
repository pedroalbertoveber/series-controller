<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::middleware('authenticator')->group(function () {
    Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
    Route::resource('/series', SeriesController::class)->except(['show']);
    Route::get('/', function () { return to_route('series.index');});
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signIn');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');