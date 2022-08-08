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
        $tripService = new Trip();
        $data = $request->validated();
        $tripService->store($data);
        return new TripResource($tripService);
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
        $data = $request->validated();
        $tripService->update( $data, $id);
       return new TripResource($tripService);
    }


    public function destroy( $id , TripService $tripService)
    {
        $tripService->delete($id);
        return new TripResource($tripService);
    }
}
