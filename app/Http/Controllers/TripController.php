<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TripService $tripService)
    {
        $trip = $tripService->index();
        return view('trip.index',compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserService $userService)
    {
        $users = $userService->index();
        return view('trip.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,TripService $tripService)
    {
        $tripService->store($request);
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
    public function edit( $id,UserService $userService,TripService $tripService)
    {
        $users = $userService-> index();
        $trip = $tripService->findOne($id);
        return view('trip.edit',compact('trip','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id,TripService $tripService)
    {
        $tripService->update($request, $id);
        return redirect('admin/trip')->with('success', 'Trip Data is successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id , TripService $tripService)
    {
        $tripService->delete($id);
        return redirect('admin/trip')->with('success', 'trip Data is successfully Deleted');
    }
}
