<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BoardingSeeder::class);
        $this->call(StaticPageSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(QuestaionSeeder::class);
        $this->call(SettingSeeder::class);
        // $this->call(PartySeeder::class);





    }
}
