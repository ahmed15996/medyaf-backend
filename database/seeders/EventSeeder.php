<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{

    public function run(): void
    {
          for ($i=0; $i < 20 ; $i++) {
                Event::create([
                  'price' => 14 + $i ,
                  'count' => 4 + $i ,
                  'created_at' => now()->subMonth(rand(1 ,7)),
                ]);
          }

         $users = User::all();
          $events = Event::all();
         foreach ($users as $user) {
           foreach ($events as $event) {
             for ($i=1; $i < rand( 2 , 5) ; $i++) {
                $event_user =  EventUser::create([
                  'user_id' => $user->id ,
                  'event_id' => $event->id ,
                  'created_at' => now()->subMonth(rand(1 ,7)),
                ]);

                $event_user->user->update([
                    'event' => $event_user->user->event + $event_user->event->count
                ]) ;

                $event->update([
                    'event_users' => $event->event_users + 1
                ]) ;
             }
           }
         }

    }
}
