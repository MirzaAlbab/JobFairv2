<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
          'title' => 'Vue JS. Application Developer',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Surabaya',
          'partner_id' => 1,
        ]);
        Job::create([
          'title' => 'Business Development Analyst',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jakarta',
          'partner_id' => 1,
        ]);
        Job::create([
          'title' => 'Admin',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jakarta',
          'partner_id' => 1,
        ]);
        Job::create([
          'title' => 'Customer Service & Operator',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 2,
        ]);
        Job::create([
          'title' => 'Sales & Marketing Clinic',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Bekasi',
          'partner_id' => 2,
        ]);
        Job::create([
          'title' => 'Graphic designer',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 2,
        ]);
        Job::create([
          'title' => '3D Modeler (Explainer video)',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 3,
        ]);
        Job::create([
          'title' => 'Assistant Manager',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jonggol',
          'partner_id' => 3,
        ]);
        Job::create([
          'title' => 'Driver',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Semarang',
          'partner_id' => 3,
        ]);
        Job::create([
          'title' => 'Staff Administrasi',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Semarang',
          'partner_id' => 4,
        ]);
        Job::create([
          'title' => 'Admin Warehouse',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Semarang',
          'partner_id' => 4,
        ]);
        Job::create([
          'title' => 'Finance Admin',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Kutai Timur',
          'partner_id' => 4,
        ]);
        Job::create([
          'title' => 'Staff Controling Inventory',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'D4',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Kupang',
          'partner_id' => 5,
        ]);
        Job::create([
          'title' => 'Technical Support Specialist',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Kupang',
          'partner_id' => 5,
        ]);
        Job::create([
          'title' => 'Vue JS. Application Developer',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Surabaya',
          'partner_id' => 6,
        ]);
        Job::create([
          'title' => 'Business Development Analyst',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jakarta',
          'partner_id' => 6,
        ]);
        Job::create([
          'title' => 'Admin',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jakarta',
          'partner_id' => 6,
        ]);
        Job::create([
          'title' => 'Customer Service & Operator',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 7,
        ]);
        Job::create([
          'title' => 'Sales & Marketing Clinic',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Bekasi',
          'partner_id' => 7,
        ]);
        Job::create([
          'title' => 'Graphic designer',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 7,
        ]);
        Job::create([
          'title' => '3D Modeler (Explainer video)',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Bekasi',
          'partner_id' => 8,
        ]);
        Job::create([
          'title' => 'Assistant Manager',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Jonggol',
          'partner_id' => 8,
        ]);
        Job::create([
          'title' => 'Driver',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Semarang',
          'partner_id' => 8,
        ]);
        Job::create([
          'title' => 'Staff Administrasi',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Semarang',
          'partner_id' => 9,
        ]);
        Job::create([
          'title' => 'Admin Warehouse',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S2',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Semarang',
          'partner_id' => 9,
        ]);
        Job::create([
          'title' => 'Finance Admin',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S3',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Kutai Timur',
          'partner_id' => 9,
        ]);
        Job::create([
          'title' => 'Staff Controling Inventory',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'D4',
          'description' => "<p><strong>Requirements</strong></p><ul><li>Possesses Bachelor's Degree/Master's Degree in Finance, Marketing, Economic, or Engineering.</li><li>Minimum 1 year of working experience in a related field.</li><li>Fresh graduate with strong analytical skill are welcome to apply.</li><li>Good communication and able to work well with cross-functional teams.</li><li>High motivation, fast-learner, and good personality.</li><li>Work location : Head Office, West Jakarta.</li></ul><p><strong>Deskripsi Pekerjaan</strong></p><ul><li>Research and Market Analysis</li><li>Business Plan &amp; Analysis Development</li><li>Intelligence Gathering on Customers and Competitors</li><li>Competitor Research</li></ul>",
          'city' => 'Kupang',
          'partner_id' => 10,
        ]);
        Job::create([
          'title' => 'Technical Support Specialist',
          'category' => 'full-time',
          'salary' => '6-8',
          'education' => 'S1',
          'description' => "<p><strong>Requirements</strong><br>1. Pendidikan S1 atau lebih dalam bidang Informatika<br>2. Menguasai web development seperti HTML, CSS, JavaScript, Vue, dll<br>3. Menguasai .Net, SQL, PostgreSQL merupakan nilai tambah<br>4. Menguasai Bahasa Inggris aktif dan pasif merupakan nilai tambah<br>5. Mampu bekerja dalam tim dan disiplin terhadap timeline<br>6. Fresh graduate bisa mengajukan.</p><p><br><strong>Deskripsi Pekerjaan</strong><br>Candidate must possess at least a Bachelor's Degree/Post-Graduate Diploma/Professional Degree in any field from a reputable university. Basic knowledge of web, databases, and software applications. Understanding T-SQL, C#, HTML, and JavaScript is a plus.</p>",
          'city' => 'Kupang',
          'partner_id' => 10,
        ]);


        
    }
}
