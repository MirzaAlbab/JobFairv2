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
          'position' => 'IT',
          'level' => 'Staff',
          'kategori' => 'full-time',
          'gaji' => '2-3',
          'requirement' => 'syarat',
          'deskripsi' => 'deskripsi',
          'penempatan' => 'Indonesia',
          'partner_id' => 1,
        ]);
        
    }
}
