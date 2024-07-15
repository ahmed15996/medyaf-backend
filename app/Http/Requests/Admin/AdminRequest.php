<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'name'       => 'required|max:255' ,
            'img'        => $this->method() == 'POSt' ? 'required|mimes:png,jpg,jpeg'  : 'nullable|mimes:png,jpg,jpeg',
            'email'      => $this->method() == 'POSt' ? 'required|email|unique:admins,email' : 'required|email|unique:admins,email,' . $this->id,
            'password'   => $this->method() == "POST" ?  'required' : 'nullable'  ,
            'role_id'    => 'required' ,
            'img'        => $this->method() == 'POST' ?  'required|mimes:png,jpg,png'  : 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
