<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
