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
            'password'   => 'required_if:type,email' ,
            'type'       => 'required' ,
            'uid'        => 'required_if:type,gmail,apple|unique:users,uid' ,
            'country_id' => 'required_if:type,email' ,
        ];
    }
}
