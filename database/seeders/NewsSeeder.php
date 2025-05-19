<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Lawatan APM ke SISPA UPSI',
                'content' => "Delegasi APM Malaysia telah mengadakan lawatan rasmi ke SISPA UPSI untuk meninjau operasi latihan dan kerjasama pertahanan awam di UPSI.

Lawatan ini bertujuan untuk:
- Menilai kemudahan latihan sedia ada
- Membincangkan peluang kerjasama baharu
- Meninjau perkembangan program latihan semasa
- Berkongsi amalan terbaik dalam pengurusan pertahanan awam

Lawatan ini merupakan langkah penting dalam mengukuhkan hubungan strategik antara APM dan SISPA UPSI.",
                'image' => 'berita-lawatanAPM.jpg',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Perkhemahan SISPA 2024',
                'content' => "Kadet SISPA telah menjalani latihan kawad dan simulasi kecemasan di Kem Bukit Hijau sebagai sebahagian daripada program pembangunan bersepadu SISPA UPSI.

Program perkhemahan ini merangkumi:
- Latihan kawad berkumpulan
- Simulasi pengurusan bencana
- Latihan pertolongan cemas
- Aktiviti pembinaan semangat berpasukan
- Latihan survival asas

Perkhemahan ini telah berjaya meningkatkan tahap kesiapsiagaan dan kemahiran para kadet dalam menghadapi pelbagai situasi kecemasan.",
                'image' => 'berita-perkhemahan.jpg',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Program Khidmat Masyarakat',
                'content' => "Kadet SISPA telah berganding bahu bersama komuniti di Slim River dalam program kebajikan yang bertujuan untuk membantu masyarakat setempat.

Aktiviti yang dijalankan termasuk:
- Pembersihan kawasan awam
- Bantuan kepada warga emas
- Program kesedaran keselamatan
- Demonstrasi pertolongan cemas
- Aktiviti gotong-royong bersama penduduk

Program ini bukan sahaja memberi manfaat kepada komuniti tetapi juga memberi pengalaman berharga kepada para kadet dalam aspek khidmat masyarakat.",
                'image' => 'berita-khidmat.jpg',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Kursus Kepimpinan Kadet',
                'content' => "Kursus kepimpinan peringkat negeri telah berjaya melatih kadet dalam aspek komunikasi dan kepimpinan lapangan. Program ini direka khas untuk melahirkan pemimpin yang berkaliber dalam kalangan kadet SISPA.

Modul-modul yang diliputi:
- Teknik komunikasi berkesan
- Pengurusan krisis
- Kepimpinan dalam situasi mencabar
- Pembangunan pasukan
- Strategi membuat keputusan

Para peserta telah menunjukkan peningkatan ketara dalam kemahiran kepimpinan dan keyakinan diri selepas mengikuti kursus ini.",
                'image' => 'berita-kursus.png',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Copy images from public directory to storage
        foreach ($news as $item) {
            // Copy image from public to storage
            if (!empty($item['image'])) {
                $sourcePath = public_path('build/assets/img/' . $item['image']);
                $destinationPath = storage_path('app/public/' . $item['image']);

                // Create directory if it doesn't exist
                if (!file_exists(dirname($destinationPath))) {
                    mkdir(dirname($destinationPath), 0755, true);
                }

                // Copy the file
                if (file_exists($sourcePath)) {
                    copy($sourcePath, $destinationPath);
                }
            }

            News::create($item);
        }
    }
}
