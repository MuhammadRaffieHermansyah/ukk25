<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'room.roomType', 'room.roomFacilities']);

        if ($request->filled('initial_date')) {
            $query->whereDate('check_in', '>=', $request->initial_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('check_out', '<=', $request->end_date);
        }

        if ($request->filled('search')) {
            $query->where('visitor_name', 'like', '%' . $request->search . '%');
        }

        $bookings = $query->latest()->paginate(10);

        return view('booking.index', compact('bookings'));
    }

    public function booked()
    {
        $bookedRooms = Booking::with(['user', 'room.roomType', 'room.roomFacilities'])->where('user_id', Auth::user()->id)->get();
        return view('booked.index', compact('bookedRooms'));
    }

    public function cetakStruk($id) {
        $bookedRoom = Booking::with(['user', 'room.roomType', 'room.roomFacilities'])->findOrFail($id);
        return view('booked.print', compact('bookedRoom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
