<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService {
    public function createActivity($activity){
        Activity::create([
            'name'=>$activity->name,
        ]);
    }
    public function updateActivity($request,$id){
        $activity = Activity::findOrFail($id);
        $activity->update([
          'name'=>$request->name,
      ]);
      }
      public function delete($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();
      }
}