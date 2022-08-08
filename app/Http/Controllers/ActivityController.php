<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActivityService $activityService)
    {
        $activity = $activityService->index();

        return view('activity.index', compact('activity'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityService $activityService,Request $request)
    {

        $show = $activityService->store($request);
        return redirect('admin/activity')->with('success', 'Activity Data is successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityService $activityService,$id)
    {
        $activity = $activityService->findOne($id);
        return view('activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id,ActivityService $activityService)
    {
       $update = $activityService->update($request, $id);
       return redirect('admin/activity')->with('success', 'Activity Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id,ActivityService $activityService)
    {
        $deleted = $activityService->delete($id);
        return redirect('admin/activity')->with('success', 'Activity Data is successfully Deleted');
    }
}
