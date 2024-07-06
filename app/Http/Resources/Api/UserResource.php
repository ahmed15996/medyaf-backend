<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
            return [
                'id'      => $this->id ,
                'name'    => $this->name ,
                'email'   => $this->email ,
                'type'    => $this->type ,
                'country' => $this->country ? $this->country->name : null ,
                'uid'     => $this->uid
            ];

    }
}
