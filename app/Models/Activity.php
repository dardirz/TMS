<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function points(){
        return $this->belongsToMany(
            Point::class,
            'point_activity',
            'activity_id',
            'point_id',
            'id',
            'id'
        );

    }
}
