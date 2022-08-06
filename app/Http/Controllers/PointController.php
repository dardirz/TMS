<?php

namespace App\Http\Controllers;

use App\Models\Point;
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
        $point = Point::all();
        return view('point.index', compact('point'))->with('activities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('point.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type'=>'required',
            'location'=>'required',
            'address'=>'required',
        ]);
        $data = $request->all();
        $show = Point::create($data);
        return redirect('admin/point')->with('success', 'Point Data is successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $point = Point::findOrFail($id);
        return view('point.edit', compact('point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'type'=>'required',
            'location'=>'required',
            'address'=>'required',
        ]);
        Point::whereId($id)->update($validatedData);
        return redirect('admin/point')->with('success', 'Point Data is successfully Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $point = Point::findOrFail($id);
        $point->delete();
        return redirect('admin/point')->with('success', 'Point Data is successfully Deleted');
    }
}
