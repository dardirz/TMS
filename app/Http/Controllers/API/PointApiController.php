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
        $pointService = new Point();
        $data = $request->validated();
        $pointService->store($data,$request);
        return new PointResource($pointService);
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
        $data = $request->validated();
        $update = $pointService->update($data, $id,$request);
        return new PointResource($update);
    }


    public function destroy( $id,PointService $pointService)
    {

        $deleted = $pointService->delete($id);
        return new PointService($deleted);
    }
}
