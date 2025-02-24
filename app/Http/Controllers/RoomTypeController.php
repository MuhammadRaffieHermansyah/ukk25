<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::latest()->get();
        return view('room-type.index', compact('roomTypes'));
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
        // dd($request);
        $data = $request->validate([
            'name' => 'required|max:255',
            'facilities' => 'required|string'
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('room-type-images');
            $arrayFasilities = array_filter(array_map('trim', explode("\n", $data['facilities'])));
            $data['facilities'] = json_encode($arrayFasilities);
            RoomType::create($data);
            return redirect()->back()->with('success', 'Room Type Data successfully stored!');
        } else {
            return redirect()->back()->withErrors('image', 'Image null!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roomType = RoomType::find($id);
        return view('room-type.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roomType = RoomType::find($id);
        $data = $request->validate([
            'name' => 'max:255',
            'facilities' => 'string'
        ]);
        if ($request->file('image')) {
            if ($roomType->image) {
                Storage::delete($roomType->image);
            }
            $arrayFasilities = array_filter(array_map('trim', explode("\n", $data['facilities'])));
            $data['facilities'] = json_encode($arrayFasilities);
            $data['image'] = $request->file('image')->store('room-type-images');
            $roomType->update($data);
            return redirect(route('room-type.index'))->with('success', 'Room type successfully updated!');
        }
        return redirect()->back()->with('error', 'Image on null!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roomType = RoomType::find($id);

        if (!$roomType) {
            return response()->json(['success' => false, 'error' => 'Room Type not found'], 404);
        }
        Storage::delete($roomType->image);
        $roomType->delete();

        return response()->json(['success' => true, 'success' => 'Room Type deleted successfully']);
    }
}
