<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect(route('room.index', absolute: false));
        }
        if (Auth::user()->role == 'receotionist') {
            return redirect(route('booking.index', absolute: false));
        }
        return view('dashboard');
    }
}
