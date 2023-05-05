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
            'description' => fake()->text(),
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836065/CareerFair/2022-04-13_074745_LOGO-GMP.png',
            'position' => fake()->randomElement(['1','2']),
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
