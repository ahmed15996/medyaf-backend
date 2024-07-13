<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class Loginsocial extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

           'name' => 'required' ,
           'email' => 'required' ,
           'type' => 'required' ,
           'uid' => 'required' ,


        ];
    }
}
