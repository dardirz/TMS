<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
  
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
