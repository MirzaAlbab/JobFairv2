<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::truncate();
        $csvFile = fopen(base_path("database/data/prodi.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Major::create([
                    "id" => $data['1'],
                    "name" => $data['2'],
                    "faculty_id" => $data['5'],
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
