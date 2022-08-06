<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip = Trip::all();
        return view('trip.index',compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required',
        ]);
        $data = $request->all();
        $show = Trip::create($data);
        return redirect('admin/trip')->with('success', 'trip Data is successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $trip = Trip::findOrFail($id);
        return view('trip.edit',compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'time' => 'required',
        ]);
        Trip::whereId($id)->update($validatedData);
        return redirect('admin/trip')->with('success', 'Trip Data is successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $point = Trip::findOrFail($id);
        $point->delete();
        return redirect('admin/trip')->with('success', 'trip Data is successfully Deleted');
    }
}
