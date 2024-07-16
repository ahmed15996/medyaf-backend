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

            'twitter'         => 'https://x.com' ,
            'facebook'        => 'https://web.facebook.com/groups/415113922769670/?_rdc=1&_rdr' ,
            'linkedin'         => 'https://www.linkedin.com/company/walaplus/posts/?feedView=all' ,
            'instagram'       => 'https://www.instagram.com/rassdnewsn/' ,
            'wattsapp'        => '001488452' ,
            'phone'           => '43542525' ,
            'email'           => 'email@yahoo.com' ,
            'gmail'           => 'gmail@gmail.com' ,
            'title'           => 'test title' ,
            'desc'            => 'test desc' ,
            'type'            => 'setting' ,
        ]);
    }
}
