<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Point;

class PointService
{
    public function createPoint($request)
    {
        $point = new Point;
        $point->name = $request->name;
        $point->location = $request->location;
        $point->address = $request->address;
        $point->long = $request->long;
        $point->lat = $request->lat;
        $point->type = $request->type;
        $point->save();
        $activities = Activity::find($request->activities);
        $point->activities()->attach($activities);
        return $point;
    }
    public function updatePoint($request, $id)
    {
        $point = Point::findOrFail($id);
        $this->removeActivity($point);
        $point->update([
            'name' => $request->name,
            'location' => $request->location,
            'address' => $request->address,
            'long' => $request->long,
            'lat' => $request->lat,
            'type' => $request->type,
        ]);
        $activities = Activity::find($request->activities);
        $point->activities()->attach($activities);
        return $point;
    }
    public function delete($id)
    {
        $point = Point::findOrFail($id);
        $this->removeActivity($point);
        $point->delete();
    }
    public function removeActivity(Point $point)
    {
        $activity = Activity::find($point->activity);
        $point->activities()->detach($activity);
        return 'Success';
    }
}
