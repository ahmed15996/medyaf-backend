<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'package_id'  => 'required|exists:events,id' ,
        ];
    }
}
