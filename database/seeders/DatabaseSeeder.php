<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
use App\Models\Partner;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        User::factory(50)->create();
        Partner::factory(50)->create();
        Job::factory(100)->create();
        
        $this->call([
            CareerfairSeeder::class,
            EventSeeder::class,
            FaqSeeder::class,
            RundownSeeder::class,
            UserSeeder::class,
       
        ]);
    }
}
