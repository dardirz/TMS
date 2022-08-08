<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityService
{

    public function index(){
        return Activity::all();
    }

    public function store(){

        $data = ['name'];
        $show = Activity::create($data);
        return $show;
    }

    public function findOne($id){
        return  Activity::findOrFail($id);
    }

    public function update(Request $request,  $id){
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

      return Activity::whereId($id)->update($validatedData);
    }

    public function delete($id){
        $activity = $this->findOne($id);
        return $activity->delete();
    }


}
