<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Haruncpi\LaravelIdGenerator\IdGenerator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
                'no_member' => $this->faker->unique(true)->numberBetween(1,600),
                'name' => $this->faker->name(),
                'address' => 'John Doe Home',
                'phone_number' => '08129741925',
                'status' => $this->faker->boolean(),
                'is_delete' => 0
            ];
    }
}
