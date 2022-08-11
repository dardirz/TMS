<?php

namespace App\Services;

use App\Models\Trip;

 class TripService {
    public function createTrip($trip){
          
          $trip = Trip::create([
            'user_id'=>$trip->user_id,
            'begin'=>$trip->begin
          ]);
          return $trip;
    }
    public function updateTrip($request,$id){
      $trip = Trip::findOrFail($id);
      $trip->update([
        'user_id'=>$request->user_id,
        'begin'=>$request->begin
    ]);
    return $trip;
    }
    public function delete($id){
      $trip = Trip::findOrFail($id);
      $trip->delete();
    }
 }