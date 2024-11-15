<?php

namespace Core\Inventory\Database\Factories;

use Core\Inventory\Models\Product as Model;
use Core\Inventory\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
        $category = Category::inRandomOrder()->first();

        return [
            'category_id' => $category ? $category->id : Category::factory()->create()->id,
            'name'        => $this->faker->text(10),
            'description' => $this->faker->text(100),
            'price'       => $this->faker->randomFloat(2, 1, 1000),
            'quantity'    => $this->faker->randomNumber(2),
        ];
    }
}
