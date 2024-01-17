<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|integer',
            'location' => 'nullable|string',
            'country' => 'nullable|string',
            'address' => 'nullable|string',
            'zip_code' => 'nullable|string',
        ];
    }
}
