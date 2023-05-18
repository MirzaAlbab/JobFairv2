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
                    "id" => $data['0'],
                    "name" => $data['1'],
                    "faculty_id" => $data['4'],
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
