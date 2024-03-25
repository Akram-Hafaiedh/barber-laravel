<?php

use App\Http\Controllers\admin\PersonController as AdminPersonController;
use App\Http\Controllers\admin\ReservationController as AdminReservationController;
use App\Http\Controllers\admin\LocationController as AdminLocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// All users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//    Admin Routes

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::resource('admin/people', AdminPersonController::class)->names([
        'index' => 'admin.people.index',
        'create' => 'admin.people.create',
        'store' => 'admin.people.store',
        'show' => 'admin.people.show',
        'edit' => 'admin.people.edit',
        'update' => 'admin.people.update',
        'destroy' => 'admin.people.destroy',
    ]);
    Route::resource('admin/localisations', AdminLocationController::class)->names([
        'index' => 'admin.locations.index',
        'create' => 'admin.locations.create',
        'store' => 'admin.locations.store',
        'edit' => 'admin.locations.edit',
        'update' => 'admin.locations.update',
        'destroy' => 'admin.locations.destroy',
        'show' => 'admin.locations.show',
    ]);
});

//   User Routes

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {

    Route::view('/home', 'home')->name('home');
    Route::resource('reservations', ReservationController::class)->names([
        'index' => 'reservations.index',
        'create' => 'reservations.create',
        'store' => 'reservations.store',
        'show' => 'reservations.show',
        'edit' => 'reservations.edit',
        'update' => 'reservations.update',
        'destroy' => 'reservations.destroy',
    ]);
});
