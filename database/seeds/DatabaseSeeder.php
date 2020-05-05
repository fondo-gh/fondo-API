<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTypeTableSeeder::class);
         $this->call(CofounderTableSeeder::class);
         $this->call(ProductProgressTableSeeder::class);
         $this->call(BusinessTeamTableSeeder::class);
         $this->call(StartupIndustryTableSeeder::class);
         $this->call(StartupTypeTableSeeder::class);
    }
}
