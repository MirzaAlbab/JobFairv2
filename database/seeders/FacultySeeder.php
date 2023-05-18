<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::truncate();
        $csvFile = fopen(base_path("database/data/fakultas.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Faculty::create([
                    "id" => $data['0'],
                    "name" => $data['1'],
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
