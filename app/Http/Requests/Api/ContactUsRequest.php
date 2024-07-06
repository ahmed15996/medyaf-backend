<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name'   => 'required|max:255' ,
            'email'  => 'required|email' ,
            'code'   => 'nullable|max:255' ,
            'msg'    => 'required' ,


        ];
    }
}
