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
            'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
            'category' => fake()->randomElement(['full-time','part-time','intern']),
            'salary' => fake()->randomElement(['2-3','3-5','6-8','8-10']),
            'education' => fake()->randomElement(['D3','D4','SMA/SMK','S1','S2','S3']),
            'city'=> fake()->city(),
            'partner_id'=> mt_rand(1,10),
        ];
    }
    
    
   

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    
}
