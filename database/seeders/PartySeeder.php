<?php

namespace Database\Seeders;

use App\Models\Party;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartySeeder extends Seeder
{

    public function run(): void
    {
        $startDate = Carbon::now()->yesterday();
        $fake = Factory::create();

        for ($i=0; $i < 500 ; $i++) {
            $date = $startDate->copy()->addDays(rand(1, 7));
            Party::create([
                'code'       => $fake->unique()->numberBetween(100000 , 999999) ,
                'name'       => 'المناسبه رقم ' . $i ,
                'img'        => 'parties/' . rand(1 , 10) . '.png' ,
                'date'       => $date ,
                'time'       => $fake->time() ,
                'qr_code'    => 1 ,
                'location'   => 'egypt' ,
                'user_id'    => rand(1 , 9) ,
                'attendance_confirmed' => 5 ,
                'scanned'              => 5 ,
                'msg'                  => 5 ,
                'waiting'              => 5 ,
                'transmission_failure' => 5 ,
                'apology'              => 5 ,
                'not_sent'             => 5 ,
                'created_at' => now()
            ]);
        }

        $parties = Party::get();

        foreach ($parties as $party) {
          for ($i=0; $i < rand(4 , 20); $i++) {
            $party->users()->create([
                'phone'               => $fake->phoneNumber() ,
                'count'               => rand(3 , 8),
                'name'                => $fake->name ,
                'sur_name'             => 'المكرمه' ,
            ]);
          }

          $party->user->update([
             'event' => $party->user->event - count($party->users)
          ]);
        }
    }
}
