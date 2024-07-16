<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'name'       => 'required|max:255' ,
            'email'      => 'required|unique:users,email' ,
            'password'   => 'required' ,
            'country_id' => 'required|exists:countries,id' ,
            'phone_type' => 'required' ,
            'device_key' => 'required' ,
        ];
    }
}
