<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\TripRequest;
use App\Http\Resources\TripResource;
use App\Models\Trip;
use App\Models\User;
use App\Services\TripService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TripApiController extends Controller
{

    public function index(TripService $tripService)
    {
        $trip = $tripService->index();
        return TripResource::collection( $trip);
    }


    public function create(UserService $userService)
    {

    }


    public function store(TripRequest $request,TripService $tripService)
    {
        $trip = new Trip();
        $data = $request->validated();
        $trip = $tripService->store($data);
        return new TripResource($trip);
    }


    public function show( $id)
    {
        $trip = Trip::findOrFail($id);
        return new TripResource( $trip);
    }


    public function edit( $id,UserService $userService,TripService $tripService)
    {

    }


    public function update(TripRequest $request,  $id,TripService $tripService)
    {
        $update = new Trip();
        $data = $request->validated();
        $update = $tripService->update( $data, $id);
        $dd = $tripService->findOne($id);
       return new TripResource( $dd);
    }


    public function destroy( $id , TripService $tripService)
    {
        $dd = $tripService->findOne($id);
        $tripService->delete($id);
        return new TripResource($dd);
    }
}
