<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StaticRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'title_ar'  => 'required|max:255' ,
            'title_en'  => 'required|max:255' ,
            'desc_ar'  => 'required' ,
            'desc_en'  => 'required' ,

        ];
    }
}
