<?php

use App\StartupIndustry;
use Illuminate\Database\Seeder;

class StartupIndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate db
        StartupIndustry::query()->truncate();

        StartupIndustry::query()->create(['name' => 'Agriculture']);
        StartupIndustry::query()->create(['name' => 'Finance']);
        StartupIndustry::query()->create(['name' => 'Fintech']);
        StartupIndustry::query()->create(['name' => 'Industry']);
        StartupIndustry::query()->create(['name' => 'Aerospace']);
        StartupIndustry::query()->create(['name' => 'Technology']);
        StartupIndustry::query()->create(['name' => 'Education']);
        StartupIndustry::query()->create(['name' => 'Fashion']);
        StartupIndustry::query()->create(['name' => 'Food and beverage']);
        StartupIndustry::query()->create(['name' => 'Health']);
        StartupIndustry::query()->create(['name' => 'Media and entertainment']);
    }
}
