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
          'job_title' => 'IT',
          'type' => 'Technology',
          'status' => 'full-time',
          'salary' => '2-3',
          'graduation' => 'SMA/SMK',
          'deskripsi' => 'deskripsi',
          'kota' => 'Sby',
          'partner_id' => 1,
        ]);
        
    }
}
