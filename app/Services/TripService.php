<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripService {

    public function index(){
        return Trip::all();
    }


    public function store($data){
       return Trip::create($data);
    }

    public function findOne($id){
        return  Trip::findOrFail($id);
    }

    public function update($data,  $id){

       return Trip::whereId($id)->update($data);

    }


    public function delete( $id) {
        $point = $this->findOne($id);
        return  $point->delete();
    }




}
