<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Supermarket;
use App\Models\Shift;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allDeliveries = Delivery::where('shift_id', '=', $request->shift)->paginate(15);
        return view('user.deliveries.index', [
            "deliveries" => $allDeliveries
        ]);
    }

    public function indexAdmin(Request $request)
    {
        $allDeliveries = Delivery::paginate(15);
        return view('admin.index', [
            "deliveries" => $allDeliveries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shift = Shift::findOrFail($request->shift);
        return view('user.deliveries.create', [
            "shift" => $shift
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
        // $this->validate($request, [
        //     'client' => 'required|string',
        //     'phone' => 'required|string',
        //     'apartment' => 'required|string',
        //     'address' => 'required|string',
        //     'shift_id' => 'required|integer'
        // ]);


        $delivery = Delivery::create([
            "shift_id" => $request->shift_id,
            "phone" => $request->phone,
            "client" => $request->client,
            "address" => $request->address,
            "apartment" => $request->appartment,
            "notes" => $request->notes ?? null,
        ]);

        //
        return back()->with('success', __('Success, you have add a new delivery'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function updateDeliveredAt(Request $request)
    {
        $delivery = Delivery::where('id', '=', $request->id)->first();
        $delivery->delivered_at = Carbon::now();
        $delivery->save();
        return back()->with('success', __('Success, delivery update status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function updateStartedAt(Request $request)
    {
        $delivery = Delivery::where('id', '=', $request->id)->first();
        $delivery->started_at = Carbon::now();
        $delivery->save();
        return back()->with('success', __('Success, delivery update status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
