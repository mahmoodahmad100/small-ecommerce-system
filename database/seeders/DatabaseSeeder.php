<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(\Core\Auth\Database\Seeds\UserSeeder::class);
        $this->call(\Core\Inventory\Database\Seeds\CategorySeeder::class);
        $this->call(\Core\Inventory\Database\Seeds\ProductSeeder::class);
    }
}
