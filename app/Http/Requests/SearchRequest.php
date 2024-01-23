<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'check_in' => 'required|string',
            'check_out' => 'required|string',
            'occupants' => 'nullable|integer',
            'room_type_name' => 'nullable|string',

        ];
    }
}
