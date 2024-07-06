<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run(): void
    {
        Country::insert([

            [
                'name_ar'    => 'الرياض' ,
                'name_en'    => 'Riyadh' ,
                'created_at' => now() ,

            ] ,

            [
                'name_ar'    => 'جده' ,
                'name_en'    => 'Jeddah' ,
                'created_at' => now() ,

            ] ,


            [
                'name_ar'    => 'مكه' ,
                'name_en'    => 'Mecca' ,
                'created_at' => now() ,

            ] ,

        ]);
    }
}






