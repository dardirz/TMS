<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => 'required',
            'type'=>'required',
            'location'=>'required',
            'address'=>'required',
            'activity_id' => 'required',
            'latitude' => 'required',
            'longitude'=>'required',
        ];
    }
}
