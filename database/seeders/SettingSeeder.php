<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    public function run(): void
    {
        Setting::create([

            'twitter'         => 'twitter' ,
            'facebook'        => 'facebook' ,
            'linkedin'         => 'linkedin' ,
            'instagram'       => 'instagram' ,
            'wattsapp'        => '001488452' ,
            'phone'           => '43542525' ,
            'location'        => 'Egypt' ,
            'email'           => 'email@yahoo.com' ,
            'gmail'           => 'gmail@gmail.com' ,
            'type'            => 'setting' ,
        ]);
    }
}
