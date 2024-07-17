<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();


        for ($i = 0; $i < 300; $i++) {

            User::create([
                'name' => $fake->name(),
                'email' => $fake->unique()->email(),
                'password' => bcrypt('password'),
                'type' => ['email', 'gmail', 'apple'][array_rand(['email', 'gmail', 'apple'])],
                'country_id' => rand(1, 3),
                'event' => rand(10, 15),
                'phone_type' => rand(0, 1) == 0 ? 'iPhone' : 'android',
                'device_key' => 'device_key',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now()->subMonth(rand(1 ,7)),
            ]);
        }

    }
}
