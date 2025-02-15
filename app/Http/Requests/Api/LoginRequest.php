<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'email'     => 'required|email' ,
            'password'  => 'required' ,
            'device_key' => 'required'
        ];
    }
}
