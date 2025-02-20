<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelFacilities = HotelFacility::latest()->get();
        return view('hotel-facilities.index', compact('hotelFacilities'));
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
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('hotel-facility-images');
            HotelFacility::create($data);
            return redirect()->back()->with('success', 'Data Hotel Facility successfully updated!');
        } else {
            return redirect()->back()->withErrors('image', 'Image null!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelFacility $hotelFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotelFacility = HotelFacility::find($id);
        return view('hotel-facilities.edit', compact('hotelFacility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotelFacility = HotelFacility::find($id);
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            if ($hotelFacility->image) {
                Storage::delete($hotelFacility->image);
            }
            $data['image'] = $request->file('image')->store('hotel-facility-images');
            $hotelFacility->update($data);
            return redirect(route('facilities.hotel.index'))->with('success', 'Hotel Facility successfully updated!');
        }
        return redirect()->back()->with('error', 'Image on null!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotelFacility = HotelFacility::find($id);

        if (!$hotelFacility) {
            return response()->json(['success' => false, 'message' => 'Room not found'], 404);
        }
        Storage::delete($hotelFacility->image);
        $hotelFacility->delete();

        return response()->json(['success' => true, 'message' => 'Room deleted successfully']);
    }
}
