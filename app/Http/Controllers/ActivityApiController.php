<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Resources\Activities;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityApiController extends Controller
{
    public function index(){
        $activities = Activity::paginate(10);
        return Activities::collection($activities);
    }
    public function create(ActivityRequest $request, ActivityService $activity){
        $activityCreated = $activity->createActivity($request);
        return Activities::make($activityCreated);
    }
    public function update(ActivityRequest $request, ActivityService $activity,$id){
        $activityUpdated = $activity->updateActivity($request, $id);  
        return Activities::make($activityUpdated);
    }
    public function delete(ActivityService $activity,$id){
        $activity->delete($id);
        return response()->json([
            'message'=>'activity deleted successfully'
        ]);
    }
  
}
