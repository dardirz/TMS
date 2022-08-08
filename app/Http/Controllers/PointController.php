<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointsRequest;
use App\Models\Activity;
use App\Models\Point;
use App\Services\PointService;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all();
        return view('admin.point.add',['activities'=>$activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointsRequest $request,PointService $point)
    {
        $point->createPoint($request);
        return redirect(url('point'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $points = Point::all();
        return view('admin.point.points', ['points' => $points]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activity::all();
        $point = point::findOrFail($id);
        return view('admin.point.edit', ['point' => $point,'activities'=>$activities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(PointsRequest $request, PointService $point, $id)
    {
        $point->updatePoint($request, $id);     //function trip::create in TripService
        return redirect(route('point-show'))->with('sucess', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointService $point,$id)
    {
        $point->delete($id);
        return redirect(route('point-show'))->with('sucess', 'User is Deleted Successful!');
    }
}
