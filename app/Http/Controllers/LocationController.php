<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Shift;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shiftLocations = Location::where('shift_id', '=', $request->shift)->get();
        $shiftLocation = Location::where('shift_id', '=', $request->shift)->latest('created_at')->first();
        $shift = Shift::where('id', '=', $request->shift)->first();


        return view('admin.locations.index', [
            "shift" => $shift,
            "locations" => $shiftLocations,
            "last" => $shiftLocation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'shift_id' => 'required|integer',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        //  Store data in database
        Location::create([
            "shift_id" => $request->shift_id,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
        ]);

        //
        return response()->json(["message" => "ok"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
