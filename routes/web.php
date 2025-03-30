<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyAuth;

Route::get('/', function () {
    return view('home');
});

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class)->middleware(VerifyAuth::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
