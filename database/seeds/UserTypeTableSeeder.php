<?php

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate the database
        UserType::query()->truncate();

        //insert into the database
        UserType::query()->create(['name' => 'Entrepreneur']);
        UserType::query()->create(['name' => 'Investor']);
    }
}
