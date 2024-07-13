<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'     => $this->id ,
            'price'  => doubleval($this->price) ,
            'count'  => $this->count ,
        ];
    }
}
