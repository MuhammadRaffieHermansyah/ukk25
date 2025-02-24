<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $rooms = Room::with('roomType', 'roomFacilities')->latest()->get();
        $rooms = Room::with('roomType', 'roomFacilities')
            ->whereDoesntHave('bookings')
            ->latest()
            ->get();
        $roomTypes = RoomType::all();
        return view('order.index', compact('rooms', 'roomTypes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'visitor_name' => 'required',
            'phone' => 'required',
            'number_of_rooms' => 'required|numeric',
            'check_in' => 'required',
            'check_out' => 'required',
            'room_type_id' => 'required',
        ]);

        $availableRooms = Room::where('room_type_id', $data['room_type_id'])
            ->whereDoesntHave('bookings')
            ->pluck('id');

        if ($availableRooms->count() < $data['number_of_rooms']) {
            return redirect()->back()->with('error', "Only " . $availableRooms->count() . " room(s) available for this type.");
        }


        for ($i = 0; $i < $data['number_of_rooms']; $i++) {
            Booking::create([
                'visitor_name' => $data['visitor_name'],
                'phone' => $data['phone'],
                'number_of_rooms' => 1,
                'check_in' => $data['check_in'],
                'check_out' => $data['check_out'],
                'room_id' => $availableRooms[$i],
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->route('booked')->with('success', "Booking successfully added!");
    }
}
