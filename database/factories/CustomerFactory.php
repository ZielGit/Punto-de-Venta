<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dni' => $this->faker->unique()->randomNumber(8),
            'ruc' => $this->faker->unique()->randomNumber(9),
            'address' => $this->faker->streetAddress,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail
        ];
    }
}
