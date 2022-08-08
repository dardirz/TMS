<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointRequest;
use App\Models\Activity;
use App\Models\Point;
use App\Services\ActivityService;
use App\Services\PointService;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PointService $pointService)
    {
        $point = $pointService->index();
        return view('point.index', compact('point'))->with('activities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ActivityService $activityService)
    {
        $activities = $activityService->index();
        return view('point.create',compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointRequest $request,PointService $pointService)
    {
        $data = $request->validated();
        $pointService->store($data,$request);
        return redirect('admin/point')->with('success', 'Point Data is successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit( $id,ActivityService $activityService,PointService $pointService)
    {
        $activities = $activityService->index();
        $point = $pointService->findOne($id);
        return view('point.edit', compact('point','activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(PointRequest $request,  $id,PointService $pointService)
    {
        $data = $request->validated();
        $update = $pointService->update($data, $id,$request);
        return redirect('admin/point')->with('success', 'Point Data is successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id,PointService $pointService)
    {
        $deleted = $pointService->delete($id);
        return redirect('admin/point')->with('success', 'Point Data is successfully Deleted');
    }
}
