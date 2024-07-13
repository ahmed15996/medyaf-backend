<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'facebook' => $this->facebook ,
            'twitter'  => $this->twitter ,
            'linkedin' => $this->linkedin ,
            'instagram'=> $this->instagram ,
            // 'lat'      => $this->lat ,
            // 'lng'      => $this->lng ,
            // 'location' => $this->location ,
            // 'email'    => $this->email ,
            // 'gmail'    => $this->gmail ,
            'wattsapp' =>   'https://wa.me/' . $this->wattsapp,
            'phone'    => $this->phone ,
        ];
    }
}
