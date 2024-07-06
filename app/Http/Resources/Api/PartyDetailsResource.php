<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartyDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'       => $this->id ,
            'name'     => $this->name ,
            'img'      => url('storage/' . $this->img) ,
            'lat'      => $this->lat ,
            'lng'      => $this->lng ,
            'location' => $this->location ,
            'date'     => $this->date ,
            'time'     => Carbon::parse($this->time)->format('h:i A'),
            'qr_code'  => $this->qr_code == 0 ? false : true ,
            'users'   => PartyUserResource::collection($this->users)
        ];
    }
}
