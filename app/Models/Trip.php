<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $casts = [
        'begin' => 'date:hh:mm'
    ];

    protected $fillable = [
        'time',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
