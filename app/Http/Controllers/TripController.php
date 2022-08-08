<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::paginate(10);
        $users = user::all();
        return view('admin.trip.trips', ['trips' => $trips,'users'=>$users]);
    }
    public function create()
    {   
        $users = User::all();
        return view('admin.trip.add',compact('users'));
    }
    public function store(TripRequest $request, TripService $trip)
    {
        $trip->createTrip($request);    //function trip::create in TripService
        return redirect(url('trips'));
    }
 
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('admin.trip.edit', ['trip' => $trip]);
    }
    public function update(TripRequest $request, TripService $trip, $id)
    {

        $trip->updateTrip($request, $id);     
        return redirect(route('trip-show'))->with('sucess', 'updated');
    }
    public function destroy(TripService $trip,$id)
    {
        $trip->delete($id);
        return redirect(route('trip-show'))->with('sucess', 'User is Deleted Successful!');
    }
   
}
