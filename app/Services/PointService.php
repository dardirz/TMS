<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Point;

class PointService {


    public function index(){
        return Point::all();
    }

    public function store($data,$request){

        $activity_id = Activity::findOrFail($request->activity_id);

        $point = Point::create($data);
        $att =$point->activities()->syncWithoutDetaching($activity_id);
        return $point;
        return $att;
    }

    public function findOne($id){
        return Point::findOrFail($id);
    }

    public function update( $data,  $id,$request){

        $activity_id = Activity::findOrFail($request->activity_id);
        $point = Point::whereId($id)->update($data);
        $point1 = Point::findOrFail($id);
        $att =$point1->activities()->sync($activity_id);
        return $point;
        return $att;
    }

    public function delete($id){
        $point = $this->findOne($id);
        return $point->delete();
    }

}
