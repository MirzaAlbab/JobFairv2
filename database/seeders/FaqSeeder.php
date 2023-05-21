<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'Bagaimana cara mengikuti 35th AOCF?',
            'answer' => '<p>Kunjungi <a href="careerfair.dpkka.unair.ac.id">bit.ly/AOCF-35</a>&nbsp;lalu klik “<strong>Login</strong>”.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Apakah ada biaya pendaftaran di 35th AOCF?',
            'answer' => '<p>Gratis! Peserta tidak dikenakan biaya sepeserpun.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Siapa saja yang boleh mengikuti 35th AOCF?',
            'answer' => '<p>Acara ini terbuka untuk umum, semua kalangan boleh berpartisipasi di 35th AOCF.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Saya sudah pernah mengikuti AOCF sebelumnya, apakah saya perlu daftar lagi untuk AOCF kali ini?',
            'answer' => '<p>Benar, Anda harus mendaftar kembali.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Setelah daftar, apa yang harus saya lakukan?',
            'answer' => '<p>Setelah mendaftar akun REDY, lengkapi profilmu hingga 100%. Setelahnya kamu bisa mulai melamar lowongan pekerjaan yang ada di 35th AOCF.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Apakah peserta wajib mengikuti seluruh rangkaian webinar di hari pertama dan kedua?',
            'answer' => '<p>Ya, peserta wajib mengikuti serangkaian acara di tanggal 15-16 Maret hingga selesai.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Apakah saya boleh mengikuti webinar saja tanpa mengikuti online recruitment?',
            'answer' => '<p>Boleh, peserta tidak harus mengikuti online recruitment di 35th AOCF.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Siapa saja yang boleh mengikuti 35th AOCF?',
            'answer' => '<p>Acara ini terbuka untuk umum, semua kalangan boleh berpartisipasi di 35th AOCF.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Apa benefit untuk jobseeker?',
            'answer' => '<p>Mempercepat akses ke institusi/perusahaan yang diminati dan mengenal lebih dekat perusahaan/institusi langsung dari tim recruiternya.</p>',
            'status' => 'active'
        ]);
        Faq::create([
            'question' => 'Bagaimana cara melamar lowongan pekerjaan di 35th AOCF?',
            'answer' => '<p>Bisa melalui website getredy.id atau dengan mengunduh REDY App di Playstore. Lowongan kerja juga akan tersedia melalui barcode Wall of Career saat acara berlangsung.</p>',
            'status' => 'active'
        ]);
    }
}
