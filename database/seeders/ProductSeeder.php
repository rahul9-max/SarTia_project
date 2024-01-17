<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(24)->create();
        // \App\Models\Product::factory()->count(24)->create();
        Product::factory()->count(10)->create();
    }
}