<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Careerfair;

class CareerfairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Careerfair::create([
        'title' => "AOCF 35th Unair",
        'description' => '<p>Airlangga Online Career Fair (AOCF) 2022 merupakan salah satu wahana strategis bagi kepentingan perusahaan/corporation dan jobseeker. Pada tahun 2022 ini, Airlangga Online Career Fair (AOCF) diadakan secara online/virtual melalui web DPKKA mengingat kondisi saat ini yang masih dalam pandemic COVID-19. Dalam hal ini, Corporation memiliki kemudahan untuk mencari talent yang sesuai dengan kualifikasi yang dibutuhkan untuk mempercepat growth dan pengembangan bisnis utamanya.</p><p>   Sedangkan bagi jobseeker, dalam event AOCF ini dapat dijadikan peluang dalam melamar pekerjaan ditengah kondisi pandemic COVID-19 terhadap jenis perusahaan dan bidang yang menjadi passion personalnya.</p><p>   Selain itu, AOCF 2022 terbuka untuk umum. Tidak hanya lulusan dari Universitas Airlangga, tetapi juga berbagai lulusan dari perguruan tinggi lain baik negeri maupun swasta. Dengan demikian, kegiatan ini sangat strategis untuk dijadikan agenda utama dalam berpartisipasi secara aktif.</p><p><br><br>&nbsp;</p><h4><strong>Rangkaian kegiatan Airlangga Online Career Fair (AOCF) 2022 :</strong></h4><ul><li>Publikasi Informasi Lowongan Pekerjaan perusahaan mitra DPKKA</li><li>Seminar online oleh mitra DPKKA</li></ul>',
        'start_date' => '2022-03-15',
        'end_date' => '2022-03-16',
        'status' => 'active',
       
    ]);
    Careerfair::create([
        'title' => "AOCF 36th Unair",
        'start_date' => '2022-01-01',
        'end_date' => '2022-01-01',
        
        'status' => 'active',
    ]);
    Careerfair::create([
        'title' => "AOCF 37th Unair",
        'start_date' => '2022-01-01',
        'end_date' => '2022-01-01',
        
        'status' => 'active',
    ]);
    
   
    }
}
