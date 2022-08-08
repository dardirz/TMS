<?php

namespace App\Services;

use App\Models\Trip;

 class TripService {
    public function createTrip($trip){
          
          $trip = Trip::create([
            'assigned_to'=>$trip->assigned_to,
            'begin'=>$trip->begin
          ]);
    }
    public function updateTrip($request,$id){
      $trip = Trip::findOrFail($id);
      $trip->update([
        'assigned_to'=>$request->driver,
        'begin'=>$request->begin
    ]);
    }
    public function delete($id){
      $trip = Trip::findOrFail($id);
      $trip->delete();
    }
 }