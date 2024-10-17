<?php

namespace Core\Inventory\Database\Seeds;

use Illuminate\Database\Seeder;
use Core\Inventory\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->create();
    }
}