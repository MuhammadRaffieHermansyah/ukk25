<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::with('roomType', 'roomFacilities');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name', 'like', "%$search%")
                  ->orWhereHas('roomType', function ($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  });
        }

        if ($request->filled('room_type_id')) {
            $query->where('room_type_id', $request->room_type_id);
        }

        $rooms = $query->latest()->paginate(15);
        // $roomFacilities = RoomFacility::all();
        $roomTypes = RoomType::all();
        // return response()->json($rooms);
        return view('room.index', compact('rooms', 'roomTypes'));
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
        $data = $request->validate([
            'name' => 'required|max:255',
            'room_type_id' => 'required|integer',
        ]);
        Room::create($data);
        return redirect()->back()->with('success', 'Data room successfully stored!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $roomFacilities = RoomFacility::all();
        $roomTypes = RoomType::all();
        $room = Room::find($id);
        return view('room.edit', compact('room', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'max:255',
            'room_type_id' => 'integer',
        ]);
        Room::find($id)->update($data);
        return redirect(route('room.index'))->with('success', 'Data room successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['success' => false, 'error' => 'Room not found'], 404);
        }

        $room->delete();

        return response()->json(['success' => true, 'success' => 'Room deleted successfully']);
    }
}
