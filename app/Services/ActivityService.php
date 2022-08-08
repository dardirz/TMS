<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService {
    public function createActivity($activity){
        $activity = Activity::create([
            'name'=>$activity->name,
        ]);
        return $activity;
    }
    public function updateActivity($request,$id){
        $activity = Activity::findOrFail($id);
        $activity->update([
          'name'=>$request->name,
      ]);
      return $activity;
      }
      public function delete($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();
      }
}