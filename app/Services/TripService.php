<?php

namespace App\Services;

use App\Models\Trip;

 class TripService {
    public function createTrip($trip){
          
          $trip = Trip::create([
            'assigned_to'=>$trip->assigned_to,
            'begin'=>$trip->begin
          ]);
          return $trip;
    }
    public function updateTrip($request,$id){
      $trip = Trip::findOrFail($id);
      $trip->update([
        'assigned_to'=>$request->assigned_to,
        'begin'=>$request->begin
    ]);
    return $trip;
    }
    public function delete($id){
      $trip = Trip::findOrFail($id);
      $trip->delete();
    }
 }