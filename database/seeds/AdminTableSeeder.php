<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate the database
        Admin::query()->truncate();

        //insert into the database
        Admin::query()->create(
            [
                'name' => 'Jane Doe',
                'email' => 'jane@doe.com',
                'password' => 'password'
            ]
        );
    }
}
