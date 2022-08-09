<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PointRequest;
use App\Http\Resources\PointResource;
use App\Models\Activity;
use App\Models\Point;
use App\Services\ActivityService;
use App\Services\PointService;
use Illuminate\Http\Request;

class PointApiController extends Controller
{

    public function index(PointService $pointService)
    {
        $point = $pointService->index();
        return PointResource::collection($point);
    }


    public function create(ActivityService $activityService)
    {

    }


    public function store(PointRequest $request,PointService $pointService)
    {
        $point = new Point();
        $data = $request->validated();
        $point=$pointService->store($data,$request);
        return new PointResource($point);
    }


    public function show( $id)
    {
        $point = Point::findOrFail($id);
        return new PointResource($point);
    }


    public function edit( $id,ActivityService $activityService,PointService $pointService)
    {

    }


    public function update(PointRequest $request,  $id,PointService $pointService)
    {
        $update = new Point();
        $data = $request->validated();
        $update = $pointService->update($data, $id,$request);
        $dd =$pointService->findOne($id);
        return new PointResource($dd);
    }


    public function destroy( $id,PointService $pointService)
    {
        $dd =$pointService->findOne($id);
        $deleted = $pointService->delete($id);
        return new PointResource($dd);
    }
}
