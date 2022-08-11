<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'begin',
        'user_id',
    ];
    public $timestamps = false;
    protected $dateFormat = 'U';
    //protected $dateFormat = 'H:i';
    // protected $casts = [
    //     'begin' => 'date:hh:ii',
    // ];
//     public function setBeginAttribute($date)
// {
//     $this->attributes['begin'] = Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d h:i:s');
// }
// public function getDate() {
//     $date = Carbon::now()->toDateTimeString(); //2020-10-12 09:05:55
//     $new_date = Carbon::createFromFormat('Y-m-d h:i:s', $date)->format('h:i'); // 10 Oct 2020
//     return $new_date;
//  }
public function user(){
    return $this->belongsTo(User::class);
}
}
