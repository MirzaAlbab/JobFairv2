<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'mirzaalbabfirdaus17@gmail.com',
            'password'=> '$2y$10$Fz4h8C5JDHNPJ3zb4rq/7epCGnoIj5kpE.Hzdq/1D67MQeH8l/o0m',
            'role' => 'admin',
            'status' => 'active',
            'careerfair_id' => 1,
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'mimin DPKKA',
            'email' => 'dpkka@gmail.com',
            'password'=> '$2y$10$Fz4h8C5JDHNPJ3zb4rq/7epCGnoIj5kpE.Hzdq/1D67MQeH8l/o0m',
            'role' => 'admin',
            'status' => 'active',
            'careerfair_id' => 1,
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'mimin BRI',
            'email' => 'miminbri@gmail.com',
            'password'=> '$2y$10$Fz4h8C5JDHNPJ3zb4rq/7epCGnoIj5kpE.Hzdq/1D67MQeH8l/o0m',
            'role' => 'company',
            'status' => 'active',
            'careerfair_id' => 1,
            'email_verified_at' => Carbon::now(),
        ]);
        
    }
}
