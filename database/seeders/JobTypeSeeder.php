<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::truncate();
        $csvFile = fopen(base_path("database/data/job_type.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                JobType::create([
                    "id" => $data['0'],
                    "name" => $data['1'],
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
