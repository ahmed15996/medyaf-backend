<?php

namespace App\Http\Requests\Api;

use Illuminate\Support\Facades\Validator;

class PartyRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'             => 'required|max:255',
            'date'             => 'required|date',
            'time'             => 'required',
            'qr_code'          => 'required',
            'img'              => 'required|mimes:png,jpg,jpeg',
            'users'            => 'required|json',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $users = json_decode($this->input('users'), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $validator->errors()->add('users', 'The users field must be a valid JSON string.');
                return;
            }

            $usersValidator = Validator::make(['users' => $users], [
                'users' => 'required|array',
                'users.*.phone' => 'required|numeric',
                'users.*.count' => 'required|integer',
                'users.*.name' => 'required|string',
                'users.*.sur_name' => 'required|string',
            ]);

            if ($usersValidator->fails()) {
                $validator->errors()->merge($usersValidator->errors());
            }
        });
    }
}





