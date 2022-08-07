<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function createTrip()
    {
        return view('admin.trip.add');
    }
    public function customCreateTrip(TripRequest $request, TripService $trip)
    {
        //$user = Auth::user();
        $trip->createTrip($request);    //function trip::create in TripService
        return redirect(url('trip'));
    }
    public function showTrips()
    {
        $trips = Trip::all();
        return view('admin.trip.trips', ['trips' => $trips]);
    }
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('admin.trip.edit', ['trip' => $trip]);
    }
    public function update(TripRequest $request, TripService $trip, $id)
    {

        $trip->updateTrip($request, $id);     //function trip::create in TripService
        return redirect(route('trip-show'))->with('sucess', 'updated');
    }
    public function destroy(TripService $trip,$id)
    {
        $trip->delete($id);
        return redirect(route('trip-show'))->with('sucess', 'User is Deleted Successful!');
    }
}
