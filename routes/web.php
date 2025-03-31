<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyAuth;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('home');
});

Route::resource('owners', OwnerController::class)->only(['index']);
Route::resource('owners', OwnerController::class)->except(['index'])->middleware([VerifyAuth::class, IsAdmin::class]);
Route::resource('cars', CarController::class)->only(['index'])->middleware(VerifyAuth::class);
Route::resource('cars', CarController::class)->except(['index'])->middleware([VerifyAuth::class, IsAdmin::class]);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('change-language/{lang}', function ($lang)
{
    if (in_array($lang, ['en', 'lt']))
    {
        session(['locale' => $lang]);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('change.language');
