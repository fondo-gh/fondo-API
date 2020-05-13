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
        UserType::query()->create(['id' => UserType::USER_TYPE_ENTREPRENEUR_ID,'name' => 'Entrepreneur']);
        UserType::query()->create(['id' => UserType::USER_TYPE_INVESTOR_ID,'name' => 'Investor']);
    }
}
