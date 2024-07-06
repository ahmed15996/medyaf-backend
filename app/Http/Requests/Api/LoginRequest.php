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
            'password'  => 'required_if:type,email' ,
            'uid'       => 'required_if:type,gmail,apple' ,
            'type'      => 'required'
        ];
    }
}
