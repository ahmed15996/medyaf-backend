<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PartyRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name'     => 'required|max:255' ,
            'date'     => 'required|date' ,
            'time'     => 'required' ,
            'qr_code'  => 'required' ,
            'users'    => 'required' ,
            'img'      => 'required|mimes:png,jpg,jpeg'

        ];
    }
}
