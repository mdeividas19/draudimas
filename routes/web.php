<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);
