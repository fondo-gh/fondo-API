<?php

use App\StartupType;
use Illuminate\Database\Seeder;

class StartupTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate db
        StartupType::query()->truncate();

        StartupType::query()->create(['name' => 'LLP - Limited liability Partnership']);
        StartupType::query()->create(['name' => 'LP - Limited Partnership']);
        StartupType::query()->create(['name' => 'LIMITED - Private Company Limited by shares']);
        StartupType::query()->create(['name' => 'PLC - Public Limited Company']);
    }
}
