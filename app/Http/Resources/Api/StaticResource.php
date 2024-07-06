<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'title' => $this->title ,
            'desc'  => $this->desc ,
        ];
    }
}
