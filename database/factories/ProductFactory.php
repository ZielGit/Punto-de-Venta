<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->unique()->word(),
            'stock' => $this->faker->randomDigit,

            'sell_price' => $this->faker->randomFloat(8,5),
            'status' => $this->faker->randomElement(['ACTIVE', 'DEACTIVATED']),
            'category_id' => Category::all()->random()->id,
            'provider_id' => Provider::all()->random()->id
        ];
    }
}
