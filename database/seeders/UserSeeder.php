<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();

        for ($i=0; $i < 10 ; $i++) {
            User::create([
                'name' => $fake->name() ,
                'email' => $fake->email() ,
                'password' => bcrypt('password') ,
                'type'    => 'email' ,
                'country_id' => rand(1 , 3) ,
                'event'     => rand(10 , 15) ,
                'email_verified_at' => now() ,
                'remember_token'=>Str::random(10),
                'created_at'=>now(),


            ]);
        }
    }
}
