<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityApiController extends Controller
{

    public function index(ActivityService $activityService)
    {
        $activity = $activityService->index();

        return ActivityResource::collection( $activity);

    }

    public function create()
    {

    }


    public function store(ActivityRequest $request,ActivityService $activityService)
    {
        $show = new Activity();
        $validated = $request->validated();
        $show = $activityService->store($validated);
        return new ActivityResource( $show);
    }


    public function show( $id)
    {
        $activity = Activity::findOrFail($id);
        return new ActivityResource( $activity);
    }


    public function edit(ActivityService $activityService,$id)
    {

    }


    public function update(ActivityRequest $request,$id,ActivityService $activityService)
    {
       $update = new Activity();
       $validated = $request->validated();
       $update = $activityService->update($validated, $id);
       $dd = $activityService->findOne($id);
       return new ActivityResource($dd);
    }

    public function destroy( $id,ActivityService $activityService)
    {

        $dd = $activityService->findOne($id);
        $deleted = $activityService->delete($id);
        return new ActivityResource($dd);

    }
}
