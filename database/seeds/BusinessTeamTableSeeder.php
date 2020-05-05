<?php

use App\BusinessTeam;
use Illuminate\Database\Seeder;

class BusinessTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate db
        BusinessTeam::query()->truncate();

        BusinessTeam::query()->create(
            [
                'name' => 'Sales and marketing team',
                'description' => 'Responsible for bringing the product to market. They use several approaches to get the word out regarding their new invention.'
            ]
        );

        BusinessTeam::query()->create(
            [
                'name' => 'Operations and Production team',
                'description' => "Responsible for bringing the product to life. They receive the product's vision and bring it into its finished stage."
            ]
        );

        BusinessTeam::query()->create(
            [
                'name' => 'Accounting and finance team',
                'description' => "They calculate the sales and finances and report back regarding the numbers."
            ]
        );


        BusinessTeam::query()->create(
            [
                'name' => 'Research and development team',
                'description' => "They are responsible for being innovative and keeping up with the latest trends and developments in whatever field the company is in."
            ]
        );
        BusinessTeam::query()->create(
            [
                'name' => 'Executive team',
                'description' => "Responsible for keeping the ship afloat. They work with all of the teams to create synergy and hold them accountable."
            ]
        );
    }
}
