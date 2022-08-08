<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripService {

    public function index(){
        return Trip::all();
    }


    public function store(Request $request){
        $request->validate([
            'time' => 'required|date_format:format',
            'user_id' => 'required',
        ]);
        $data = $request->all();
       return Trip::create($data);
    }

    public function findOne($id){
        return  Trip::findOrFail($id);
    }

    public function update(Request $request,  $id){
        $validatedData = $request->validate([
            'time' => 'required',
            'user_id' => 'required',
        ]);
        Trip::whereId($id)->update($validatedData);

    }


    public function delete( $id) {
        $point = $this->findOne($id);
        return  $point->delete();
    }




}
