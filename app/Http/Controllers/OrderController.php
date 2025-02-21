<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $rooms = Room::with('roomType', 'roomFacilities')->latest()->get();
        return view('order.index', compact('rooms'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'visitor_name' => 'required',
            'phone' => 'required',
            'number_of_rooms' => 'required|numeric',
            'check_in' => 'required',
            'check_out' => 'required',
            'room_id' => 'required',
        ]);
        $data['user_id'] = Auth::user()->id;
        Booking::create($data);
        return redirect()->back()->with('success', "Booking successfully!");
    }
}
