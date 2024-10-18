<?php

namespace Core\Inventory\Database\Seeds;

use Illuminate\Database\Seeder;
use Core\Inventory\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();
    }
}