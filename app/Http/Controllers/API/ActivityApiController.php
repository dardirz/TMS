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

       $validated = $request->validated();
       $update = $activityService->update($validated, $id);
       return new ActivityResource($update);
    }

    public function destroy( $id,ActivityService $activityService)
    {

        $deleted = $activityService->delete($id);
        return new ActivityResource($deleted);

    }
}
