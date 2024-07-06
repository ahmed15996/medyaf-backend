<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{

    public function run(): void
    {
          for ($i=0; $i < 10 ; $i++) {
                Event::create([
                  'price' => 14 + $i ,
                  'count' => 4 + $i
                ]);
          }
    }
}
