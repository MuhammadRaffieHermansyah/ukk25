<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use App\Models\RoomFacility;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomFacilities = RoomFacility::latest()->get();
        return view('room-facilities.index', compact('roomFacilities'));
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
        $validated = $request->validate([
            'room_Type' => 'required|string',
            'fasilities' => 'required|string'
        ]);

        $arrayFasilities = array_filter(array_map('trim', explode("\n", $validated['fasilities'])));
        RoomFacility::create([
            'room_type' => $validated['room_Type'],
            'facilities' => json_encode($arrayFasilities) // Ubah ke JSON sebelum disimpan
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(RoomFacility $roomFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roomFacility = RoomFacility::find($id);
        return view('room-facilities.edit', compact('roomFacility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roomFacility = RoomFacility::find($id);
        $validated = $request->validate([
            'room_Type' => 'string',
            'fasilities' => 'string'
        ]);

        $arrayFasilities = array_filter(array_map('trim', explode("\n", $validated['fasilities'])));
        $roomFacility->update([
            'room_type' => $validated['room_Type'],
            'facilities' => json_encode($arrayFasilities) 
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roomFacility = RoomFacility::find($id);

        if (!$roomFacility) {
            return response()->json(['success' => false, 'message' => 'Room Type not found'], 404);
        }
        $roomFacility->delete();

        return response()->json(['success' => true, 'message' => 'Room Type deleted successfully']);
    }
}
