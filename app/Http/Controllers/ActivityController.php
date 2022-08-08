<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index(ActivityService $activityService)
    {
        $activity = $activityService->index();

        return view('activity.index', compact('activity'));

    }

    public function create()
    {
        return view('activity.create');
    }


    public function store(ActivityRequest $request,ActivityService $activityService)
    {
        $validated = $request->validated();
        $show = $activityService->store($validated);
        return redirect('admin/activity')->with('success', 'Activity Data is successfully Created');
    }


    public function show(Activity $activity)
    {
        //
    }


    public function edit(ActivityService $activityService,$id)
    {
        $activity = $activityService->findOne($id);
        return view('activity.edit', compact('activity'));
    }


    public function update(ActivityRequest $request,$id,ActivityService $activityService)
    {
        $validated = $request->validated();
       $update = $activityService->update($validated, $id);
       return redirect('admin/activity')->with('success', 'Activity Data is successfully updated');
    }

    public function destroy( $id,ActivityService $activityService)
    {
        $deleted = $activityService->delete($id);
        return redirect('admin/activity')->with('success', 'Activity Data is successfully Deleted');
    }
}
