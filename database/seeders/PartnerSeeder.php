<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'company' => 'BRI',
            'description' => 'BRI',
            'careerfair_id' => mt_rand(1, 5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649835947/CareerFair/2022-04-13_074547_bri.png',
            'position' => '1',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'Mandiri',
            'description' => 'Mandiri',
            'careerfair_id' => mt_rand(1, 5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649835957/CareerFair/2022-04-13_074557_LOGO-Mandiri.png',
            'position' => '1',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'Pegadaian',
            'description' => 'Pegadaian',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649835968/CareerFair/2022-04-13_074608_LOGO-Pegadaian.png',
            'position' => '1',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'Mega Persada Group',
            'description' => 'Mega Persada Group',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649835986/CareerFair/2022-04-13_074626_LOGO-Mega-Persada-Group.png',
            'position' => '1',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'TECHCONNECT academy',
            'description' => 'TECHCONNECT academy',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649835995/CareerFair/2022-04-13_074635_LOGO-Techconnect-Academy.png',
            'position' => '1',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'Malindo',
            'description' => 'Malindo',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836011/CareerFair/2022-04-13_074651_LOGO-Malindo.png',
            'position' => '2',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'AnterAja',
            'description' => 'AnterAja',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836034/CareerFair/2022-04-13_074714_LOGO-Anteraja.png',
            'position' => '2',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'LOreal',
            'description' => 'LOreal',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836043/CareerFair/2022-04-13_074723_LOGO-Loreal.png',
            'position' => '2',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'Bank Muamalat',
            'description' => 'Bank Muamalat',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836053/CareerFair/2022-04-13_074733_LOGO-Bank-Muamalat.png',
            'position' => '2',
            'status' => 'active'
        ]);
        Partner::create([
            'company' => 'PT Graha Mutu Persada',
            'description' => 'PT Graha Mutu Persada',
            'careerfair_id' => mt_rand(1,5),
            'img' => 'https://res.cloudinary.com/dxd813fbq/image/upload/v1649836065/CareerFair/2022-04-13_074745_LOGO-GMP.png',
            'position' => '2',
            'status' => 'active'
        ]);
    }
}
