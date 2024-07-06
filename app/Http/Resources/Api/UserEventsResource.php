<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserEventsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $count = 0 ;

        return [
            'id'    => $this->event->id ,
            'price' => $this->event->price ,
            'count' => $this->event->count ,
        ];

        $count +=$this->event->count ;
        dd($count);
    }
}
