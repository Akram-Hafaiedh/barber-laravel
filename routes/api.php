<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/locations/{id}/people', [LocationController::class, 'people'])->name('locations.people');
Route::get('/people/{id}/services', [PersonController::class, 'services'])->name('person.services');
