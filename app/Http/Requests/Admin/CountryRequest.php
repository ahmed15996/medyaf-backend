<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name_ar'  => $this->method() == "POST" ? 'required|max:255|unique:countries,name_ar' : 'required|max:255|unique:countries,name_ar,' . $this->id ,
            'name_en'  => $this->method() == "POST" ? 'required|max:255|unique:countries,name_en' : 'required|max:255|unique:countries,name_en,' . $this->id ,

        ];
    }
}
