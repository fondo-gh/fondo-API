<?php

use App\ProductProgress;
use Illuminate\Database\Seeder;

class ProductProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate table
        ProductProgress::query()->truncate();

        ProductProgress::query()->create(['name' => 'Concept only']);
        ProductProgress::query()->create(['name' => 'Product development']);
        ProductProgress::query()->create(['name' => 'Prototype ready']);
        ProductProgress::query()->create(['name' => 'Product ready']);
        ProductProgress::query()->create(['name' => 'Product already on the market']);
    }
}
