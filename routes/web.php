<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Models\HotelFacility;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect(route('login'));
// });

Route::get('/', function () {
    if (Auth::user()->role == 'admin') {
        return redirect(route('room', absolute: false));
    }
    if (Auth::user()->role == 'receotionist') {
        return redirect(route('room', absolute: false));
    }
    // if (Auth::user()->role == 'visitor') {
    //     return redirect(route('home', absolute: false));
    // }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/room')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('room');
    });

    Route::prefix('/facilities')->group(function () {
        Route::get('/', function () {
            $hotelFacilities = HotelFacility::all();
            return view('facilities.index', compact('hotelFacilities'));
        })->name('facilities');
        Route::get('/hotel', function () {
            return view('hotel-facilities.index');
        })->name('hotel.facilities');
        Route::get('/room', function () {
            return view('room-facilities.index');
        })->name('room.facilities');
    });
});

require __DIR__ . '/auth.php';
