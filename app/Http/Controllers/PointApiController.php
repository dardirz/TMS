<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointsRequest;
use App\Http\Resources\Points;
use App\Models\Point;
use App\Services\PointService;
use Illuminate\Http\Request;

class PointApiController extends Controller
{
    public function index(){
        $points = Point::paginate(10);
        return Points::collection($points);
    }
    public function create(PointsRequest $request, PointService $point){
        $pointCreated = $point->createPoint($request);
        return Points::make($pointCreated);
    }
    public function update(PointsRequest $request, PointService $point,$id){
        $pointUpdated = $point->updatePoint($request, $id);  
        return Points::make($pointUpdated);
    }
    public function delete(PointService $point,$id){
        $point->delete($id);
        return response()->json([
            'message'=>'point deleted successfully'
        ]);
    }
}
