<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TripController extends Controller
{

    public function index(TripService $tripService)
    {
        $trip = $tripService->index();
        return view('trip.index',compact('trip'));
    }


    public function create(UserService $userService)
    {
        $users = $userService->index();
        return view('trip.create',compact('users'));
    }


    public function store(TripRequest $request,TripService $tripService)
    {
        $data = $request->validated();
        $tripService->store($data);
        return redirect('admin/trip')->with('success', 'trip Data is successfully Created');
    }


    public function show(Trip $trip)
    {
        //
    }


    public function edit( $id,UserService $userService,TripService $tripService)
    {
        $users = $userService-> index();
        $trip = $tripService->findOne($id);
        return view('trip.edit',compact('trip','users'));
    }


    public function update(TripRequest $request,  $id,TripService $tripService)
    {
        $data = $request->validated();
        $tripService->update( $data, $id);
        return redirect('admin/trip')->with('success', 'Trip Data is successfully Updated ');
    }


    public function destroy( $id , TripService $tripService)
    {
        $tripService->delete($id);
        return redirect('admin/trip')->with('success', 'trip Data is successfully Deleted');
    }
}
