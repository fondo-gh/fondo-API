<?php

use App\CofounderRole;
use Illuminate\Database\Seeder;

class CofounderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate db
        CofounderRole::query()->truncate();

        CofounderRole::query()->create(['name' => 'Chairman']);
        CofounderRole::query()->create(['name' => 'Chief Executive Officer']);
        CofounderRole::query()->create(['name' => 'Chief Operations Officer']);
        CofounderRole::query()->create(['name' => 'Chief Financial Officer']);
        CofounderRole::query()->create(['name' => 'Chief Administrative Officer (CAO)']);
        CofounderRole::query()->create(['name' => 'Chief Information Officer (CIO)']);
        CofounderRole::query()->create(['name' => 'Chief Technical Officer']);
        CofounderRole::query()->create(['name' => 'Chief Marketing Officer (CMO)']);
        CofounderRole::query()->create(['name' => 'Chief Human Resource Officer']);
    }
}
