<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Point;

class PointService {


    public function index(){
        return Point::all();
    }

    public function store(Request $request){
        $activity_id = Activity::findOrFail($request->activity_id);
        $name = $activity_id->name;
        $request->validate([
            'name' => 'required',
            'type'=>'required',
            'location'=>'required',
            'address'=>'required',
            'activity_id'=>'required',
        ]);
        $data = $request->all();
        $point = Point::create($data);
        $att =$point->activities()->syncWithoutDetaching($activity_id);
        return $point;
        return $att;
    }

    public function findOne($id){
        return Point::findOrFail($id);
    }

    public function update(Request $request,  $id){

        $activity_id = Activity::findOrFail($request->activity_id);
        $validatedData = $request->validate([
            'name' => 'required',
            'type'=>'required',
            'location'=>'required',
            'address'=>'required',
            'activity_id' => 'required',
            'latitude' => 'required',
            'longitude'=>'required',
        ]);

        $point = Point::whereId($id)->update($validatedData);
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
