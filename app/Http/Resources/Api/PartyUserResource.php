<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartyUserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'       => $this->id ,
            'phone'    => $this->phone ,
            'count'    => $this->count ,
            'name'     => $this->name ,
            'sur_name' => $this->sur_name ,
        ];
    }
}
