<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerAPI;
use App\Http\Controllers\CarAPI;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/owners', [OwnerAPI::class, "index"]);
Route::get('/owners/{id}', [OwnerAPI::class, "show"]);
Route::post('/owners', [OwnerAPI::class, "store"]);
Route::put('/owners/{id}', [OwnerAPI::class, "update"]);
Route::delete('/owners/{id}', [OwnerAPI::class, "destroy"]);

Route::get('/cars', [CarAPI::class, "index"]);
Route::get('/cars/{id}', [CarAPI::class, "show"]);
Route::post('/cars', [CarAPI::class, "store"]);
Route::put('/cars/{id}', [CarAPI::class, "update"]);
Route::delete('/cars/{id}', [CarAPI::class, "destroy"]);
