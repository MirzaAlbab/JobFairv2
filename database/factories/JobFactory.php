<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->jobTitle(),
            'type' => fake()->text(),
            'category' => fake()->randomElement(['full-time','part-time']),
            'salary' => fake()->randomElement(['2-3','3-5','6-8','8-10']),
            'education' => fake()->randomElement(['D3','D4','SMA/SMK','S1','S2']),
            'description'=> fake()->text(),
            'city'=> fake()->city(),
            'partner_id'=> mt_rand(1,50),
        ];
    }
    
    
   

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    
}
