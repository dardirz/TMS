<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService
{

    public function index(){
        return Activity::all();
    }

    public function store($data){

        return Activity::create($data);

    }

    public function findOne($id){
        return  Activity::findOrFail($id);
    }

    public function update( $data , $id){

      return Activity::whereId($id)->update($data);
    }

    public function delete($id){
        $activity = $this->findOne($id);
        return $activity->delete();
    }


}
