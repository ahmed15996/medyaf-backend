<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'facebook'   => 'required' ,
            'twitter'   => 'required' ,
            'linkedin'   => 'required' ,
            'instagram'   => 'required' ,
            'wattsapp'   => 'required' ,
            'phone'   => 'required' ,
            'email'   => 'required' ,
            'gmail'   => 'required' ,
            'title'  => 'required' ,
            'desc'   => 'required'

        ];
    }
}
