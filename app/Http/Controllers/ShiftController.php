<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Models\Supermarket;
use Carbon\Carbon;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userShifts = auth()->user()->shifts;
        return view('user.shifts.index', [
            "shifts" => $userShifts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allSupermarkets = Supermarket::all();
        return view('user.shifts.create', [
            "supermarkets" => $allSupermarkets
        ]);
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
            'start_kilometers' => 'required|integer',
            'plate' => 'required|string'
        ]);

        //  Store data in database
        Shift::create([
            "user_id" => auth()->user()->id,
            "supermarket_id" => $request->supermarket,
            "start_kilometers" => $request->start_kilometers,
            "end_kilometers" => $request->start_kilometers,
            "plate" => $request->plate,
            "started_at" => Carbon::now()
        ]);

        //
        return back()->with('success', 'Your form has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function editEnd(Request $request)
    {
        $shift = Shift::findOrFail($request->id);
        return view('user.shifts.edit-end', [
            'shift' => $shift
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function updateEnd(Request $request)
    {

        $shift = Shift::findOrFail($request->id);
        $shift->ended_at = Carbon::now();
        $shift->end_kilometers = $request->end_kilometers;
        $shift->save();
        return redirect('/shifts')->with('success', __('Success end shift'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
