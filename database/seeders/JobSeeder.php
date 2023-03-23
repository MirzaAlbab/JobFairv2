<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
          'title' => 'IT',
          'type' => 'Technology',
          'category' => 'full-time',
          'salary' => '2-3',
          'education' => 'SMA/SMK',
          'description' => 'deskripsi',
          'city' => 'Sby',
          'partner_id' => 1,
        ]);
        
    }
}
