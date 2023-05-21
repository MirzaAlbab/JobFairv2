<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company' => fake()->company(),
            'description' => '',
            'careerfair_id' => mt_rand(1,3),
            'position' => mt_rand(1,5),
            'status' => fake()->randomElement(['active','inactive']),
            // 'status'=> fake()->randomElements(['active','inactive'])
        ];
    }
   

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    
}
