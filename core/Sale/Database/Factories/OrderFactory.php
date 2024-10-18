<?php

namespace Core\Sale\Database\Factories;

use Core\Sale\Models\Order as Model;
use Core\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();

        return [
            'user_id'  => $user ? $user->id : User::factory()->create()->id,
            'tax'      => 15,
            'subtotal' => 100,
            'total'    => 115,
        ];
    }
}
