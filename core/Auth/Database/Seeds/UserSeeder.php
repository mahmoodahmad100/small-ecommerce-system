<?php

namespace Core\Auth\Database\Seeds;

use Illuminate\Database\Seeder;
use Core\Auth\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            User::factory()->create(['email' => "user{$i}@example.com"]);
        }
    }
}