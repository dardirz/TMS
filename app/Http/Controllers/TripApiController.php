<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Http\Resources\Trips;
use App\Models\Trip;
use App\Services\TripService;
use Illuminate\Http\Request;

class TripApiController extends Controller
{
    public function index(){
        $trips = Trip::paginate(10);
        return Trips::collection($trips);
    }
    public function create(TripRequest $request, TripService $trip){
        $tripCreated = $trip->createTrip($request);
        return Trips::make($tripCreated);
    }
    public function update(TripRequest $request, TripService $trip,$id){
        $tripUpdated = $trip->updateTrip($request, $id);  
        return Trips::make($tripUpdated);
    }
    public function delete(TripService $trip,$id){
        $trip->delete($id);
        return response()->json([
            'message'=>'trip deleted successfully'
        ]);
    }
}
