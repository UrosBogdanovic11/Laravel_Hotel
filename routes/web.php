<?php

use App\Http\Controllers\AmenitiesController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DiningController;

use App\Http\Controllers\RoomController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\LogInController;

use App\Http\Controllers\ReservationController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('page.home'); 
});

Route::get('/amenities', [AmenitiesController::class, 'index'])->name('amenities');

Route::get('/dining', [DiningController::class, 'index'])->name('dining');

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LogInController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LogInController::class, 'login']);
Route::post('/logout', [LogInController::class, 'logout'])->name('logout');


Route::get('/reservation', [ReservationController::class, 'show'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservations.store');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/reservations/cancel/{id}', [ProfileController::class, 'cancel'])->name('reservations.cancel');

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::put('/admin/reservations/{id}', [AdminController::class, 'update'])->name('admin.reservations.update');
Route::delete('/admin/reservations/{id}', [AdminController::class, 'destroy'])->name('admin.reservations.destroy');

