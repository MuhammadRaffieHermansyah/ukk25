<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingPageController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

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
    Route::resource('/booking', BookingController::class)->name('*', 'booking');
    Route::get('/booking-history', [BookingController::class, 'bookingHistory'])->name('booking.history');
    Route::prefix('/order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/', [OrderController::class, 'store'])->name('store');
    });
    Route::get('/booked', [BookingController::class, 'booked'])->name('booked');
    Route::get('/cetak-struk/{id}', [BookingController::class, 'cetakStruk'])->name('cetak.struk');
});

require __DIR__ . '/auth.php';
