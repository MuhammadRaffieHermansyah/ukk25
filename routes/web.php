<?php

use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\RoomTypeController;
use App\Models\HotelFacility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::user()->role == 'admin') {
        return redirect(route('room.index', absolute: false));
    }
    if (Auth::user()->role == 'receotionist') {
        return redirect(route('room.index', absolute: false));
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/room', RoomController::class)->name('*', 'room');
    Route::resource('/room-type', RoomTypeController::class)->name('*', 'room-type');
    Route::prefix('/facilities')->name('facilities.')->group(function () {
        Route::resource('/hotel', HotelFacilityController::class)->name('*', 'hotel');
        Route::resource('/room', RoomFacilityController::class)->name('*', 'room');
    });
});

require __DIR__ . '/auth.php';
