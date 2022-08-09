<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'location',
        'address',
        'latitude',
        'longitude',
        'activity_id'

    ];

    public function activities(){
        return $this->belongsToMany(
            Activity::class,
            'point_activity',
            'point_id',
            'activity_id',
            'id',
            'id'
        );

    }


}
