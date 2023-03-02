<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Rundown;
use Illuminate\Database\Seeder;

class RundownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rundown::create([
            'time' => Carbon::parse('2022-03-16'),
            'event' => '<p>9:00 – 9:30&nbsp; &nbsp; &nbsp;| <strong>Opening 35th AOCF</strong><br>9:30 – 10:30&nbsp; &nbsp;| <strong>Company Session AnterAja</strong><br>10:30 – 11:30 | <strong>Webinar Session – How to Create a Profesional CV and Interview Practice for Fresh Graduates.</strong><br>11:30 – 12:00 | <strong>Games</strong><br>12:00 – 13:00 | <strong>Company Session Mega Persada</strong><br>13:30 – 14:30 | <strong>Company Session Bank Mandiri</strong><br>14:30 – 15:30 | <strong>Company Session Bank Muamalat</strong><br>15:30 – 15:50 | <strong>Games</strong><br>15:50 – 16:00<strong> | Closing</strong></p>',
            'careerfair_id' => 1,
            'status' => 'active'
        ]);
        Rundown::create([
            'time' => Carbon::parse('2022-03-16'),
            'event' => '<p>9:00 – 9:30&nbsp; &nbsp; &nbsp;| <strong>Opening 35th AOCF</strong><br>9:30 – 10:30&nbsp; &nbsp;| <strong>Webinar Session – Pentingnya Work-Life Balance dan Tips Mencapainya</strong><br>10:30 – 11:30 | <strong>Company Session Artaboga</strong><br>11:30 – 12:30 | <strong>Company Session Pegadaian</strong><br>12:30 – 13:00 | <strong>Games</strong>&nbsp;<br>13:00 – 14:00 | <strong>Company Session BRI</strong><br>14:00 – 15:00 | <strong>Company Session Kalla</strong><br>15:00 – 15:30 | <strong>Games</strong><br>15:30 – 16:00 |<strong> Closing</strong></p>',
            'careerfair_id' => 1,
            'status' => 'active'
        ]);
    }
}
