<?php

namespace App\Http\Controllers;

use App\Models\HotelFacility;
use Illuminate\Http\Request;

class HotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelFacilities = HotelFacility::all();
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
        //
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
    public function edit(HotelFacility $hotelFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelFacility $hotelFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelFacility $hotelFacility)
    {
        //
    }
}
