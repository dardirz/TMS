<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PointRequest;
use App\Models\Activity;
use App\Models\Point;
use App\Services\ActivityService;
use App\Services\PointService;
use Illuminate\Http\Request;

class PointController extends Controller
{

    public function index(PointService $pointService)
    {
        $point = $pointService->index();
        return view('point.index', compact('point'))->with('activities');
    }


    public function create(ActivityService $activityService)
    {
        $activities = $activityService->index();
        return view('point.create',compact('activities'));
    }


    public function store(PointRequest $request,PointService $pointService)
    {
        $data = $request->validated();
        $pointService->store($data,$request);
        return redirect('admin/point')->with('success', 'Point Data is successfully Created');
    }


    public function show(Point $point)
    {
        //
    }


    public function edit( $id,ActivityService $activityService,PointService $pointService)
    {
        $activities = $activityService->index();
        $point = $pointService->findOne($id);
        return view('point.edit', compact('point','activities'));
    }


    public function update(PointRequest $request,  $id,PointService $pointService)
    {
        $data = $request->validated();
        $update = $pointService->update($data, $id,$request);
        return redirect('admin/point')->with('success', 'Point Data is successfully Updated ');
    }


    public function destroy( $id,PointService $pointService)
    {
        $deleted = $pointService->delete($id);
        return redirect('admin/point')->with('success', 'Point Data is successfully Deleted');
    }
}
