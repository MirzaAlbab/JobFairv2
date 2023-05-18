<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'title' => 'Engage. Produce. Grow - with us!',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH ANTERAJA]<br><br>Halo, career fighters! Anteraja (PT. Tri Adi Bersama) telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Anteraja? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday1<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
           
            'time' => Carbon::parse('2022-03-15 09:30:00'),
            'careerfair_id' => 5,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZMtceGprjkoHtaP0XpR-qOjpvxv26xjt2DF',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'How to Create a Professional CV and Interview Practice for Fresh Graduates',
            'description' => '<p>[WEBINAR BERSERTIFIKAT 10SKP]<br><br>Pengen tau rahasia bikin CV ATS yang bikin HRD jatuh hati? Terus cara memaksimalkan performa saat wawancara kerja tuh bagaimana sih?<br><br>Yuk cari tau jawabannya di 35th AOCF Webinar Day 1 yang satu ini!<br><br>Eits nggak cuma itu! Di sini kamu juga bakal bertemu dengan perusahaan-perusahaan keren yang sedang membuka kesempatan berkarir di 35th AOCF ini lho~<br><br>Geser ke kiri untuk info lebih lengkapnya!<br><br>GRATIS DAN TERBUKA UNTUK UMUM! Daftarkan dirimu di: bit.ly/aocfday1<br><br>Map your future with us! ✨</p>',
           
            'time' => Carbon::parse('2022-03-15 10:30:00'),
            'careerfair_id' => 1,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZMtceGprjkoHtaP0XpR-qOjpvxv26xjt2DF',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Look Inside MPG Manufacturing Factory',
            'description' => '<p><br>[AOCF CAREER WORKSHOP WITH MEGA PERSADA GROUP]<br><br>Halo, career fighters! Mega Persada Group telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Mega Persada Group? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday1<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
            
            'time' => Carbon::parse('2022-03-15 12:00:00'),
            'careerfair_id' => 3,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZMtceGprjkoHtaP0XpR-qOjpvxv26xjt2DF',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Leveling Up Digital Transformation Through Financial Super App',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH BANK MANDIRI]<br><br>Halo, career fighters! Bank Mandiri telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Bank Mandiri ? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday1<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
           
            'time' => Carbon::parse('2022-03-15 13:30:00'),
            'careerfair_id' => 1,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZMtceGprjkoHtaP0XpR-qOjpvxv26xjt2DF',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Shape your future without limits',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH BANK MUAMALAT]<br><br>Halo, career fighters! Bank Muamalat telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Bank Muamalat? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday1<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
            
            'time' => Carbon::parse('2022-03-15 14:30:00'),
            'careerfair_id' => 4,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZMtceGprjkoHtaP0XpR-qOjpvxv26xjt2DF',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Pentingnya Work-Life Balance dan Tips Mencapainya',
            'description' => '<p>[WEBINAR BERSERTIFIKAT 10SKP]<br><br>Seberapa penting sih work-life balance itu? Terus, bagaimana cara mewujudkannya agar kita nggak burnout?<br><br>Yuk cari tau jawabannya di 35th AOCF Webinar Day 2 yang satu ini!<br><br>Eits nggak cuma itu! Di sini kamu juga bakal bertemu dengan perusahaan-perusahaan keren yang sedang membuka kesempatan berkarir di 35th AOCF ini lho~<br><br>Geser ke kiri untuk info lebih lengkapnya!<br><br>GRATIS DAN TERBUKA UNTUK UMUM! Daftarkan dirimu di: bit.ly/aocfday2</p>',
            
            'time' => Carbon::parse('2022-03-16 09:30:00'),
            'careerfair_id' => 2,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZAtce2urzMpGNL7vGHrjTdPJFRY4zBeVOtj',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Company Session - artaboga',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH PT ARTA BOGA CEMERLANG]<br><br>Halo, career fighters! PT Arta Boga Cemerlang telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di PT Arta Boga Cemerlang? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday2<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
           
            'time' => Carbon::parse('2022-03-16 10:30:00'),
            'careerfair_id' => 3,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZAtce2urzMpGNL7vGHrjTdPJFRY4zBeVOtj',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Kita Sukses Berkarier Bagi Millennial',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH PT PEGADAIAN]<br><br>Halo, career fighters! PT Pegadaian telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di PT Pegadaian? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday2<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
           
            'time' => ('2022-03-16 11:30:00'),
            'careerfair_id' => 3,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZAtce2urzMpGNL7vGHrjTdPJFRY4zBeVOtj',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'Career Starter Hack: How to Get Noticed and Hired?',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH BANK BRI]<br><br>Halo, career fighters! Bank BRI telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Bank BRI? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday2<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
         
            'time' => Carbon::parse('2022-03-16 13:00:00'),
            'careerfair_id' => 2,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZAtce2urzMpGNL7vGHrjTdPJFRY4zBeVOtj',
            'status' => 'active'
        ]);
        Event::create([
            'title' => 'The future of work: Be Ready & Stay Relevant',
            'description' => '<p>[AOCF CAREER WORKSHOP WITH KALLA GROUP]<br><br>Halo, career fighters! Kalla Group telah resmi bergabung sebagai perusahaan mitra 35th AOCF lho!<br><br>Pengen tau prospek karir yang ada di Kalla Group? Yuk ikuti Company Sessionnya! Daftarkan dirimu di: bit.ly/aocfday2<br><br>GRATIS DAN TERBUKA UNTUK UMUM!!!<br><br>See you!</p>',
           
            'time' => Carbon::parse('2022-03-16 14:00:00'),
            'careerfair_id' => 1,
            'location' => 'Zoom Meeting',
            'link' => 'https://us06web.zoom.us/meeting/register/tZAtce2urzMpGNL7vGHrjTdPJFRY4zBeVOtj',
            'status' => 'active'
        ]);
    }
}
