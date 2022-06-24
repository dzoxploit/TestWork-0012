<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name' => $this->faker->name(),
                'description'  => $this->faker->sentences(2, true),
                'price' => 20000,
                'stock' => 20,
                'status' => $this->faker->boolean(),
                'is_delete' => 0
            ];
    }
}
