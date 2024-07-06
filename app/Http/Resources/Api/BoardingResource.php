<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardingResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'    => $this->id ,
            'title' => $this->title ,
            'desc'  => $this->desc ,
            'img'   => url('storage/' . $this->img)
        ];
    }
}
