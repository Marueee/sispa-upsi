<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Majlis Pentauliahan SISPA',
                'description' => 'Majlis Pentauliahan Pegawai Kadet SISPA UPSI Sesi 2023/2024 telah diadakan dengan jayanya. Program ini merupakan kemuncak kepada latihan intensif yang telah dilalui oleh para kadet.',
                'status' => 'published',
                'image' => 'gallery-pentauliahan.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Latihan Kawad',
                'description' => 'Latihan kawad berkala SISPA UPSI di padang kawad utama merupakan salah satu aktiviti teras dalam pembentukan disiplin dan ketahanan diri para kadet.',
                'status' => 'published',
                'image' => 'gallery-kawad.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Program Khidmat Masyarakat',
                'description' => 'Program bantuan banjir bersama komuniti Tanjong Malim membuktikan komitmen SISPA UPSI dalam membantu masyarakat ketika menghadapi situasi kecemasan.',
                'status' => 'published',
                'image' => 'gallery-khidmat.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        // Copy images from public directory to storage
        foreach ($galleries as $item) {
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

            Gallery::create($item);
        }
    }
}
