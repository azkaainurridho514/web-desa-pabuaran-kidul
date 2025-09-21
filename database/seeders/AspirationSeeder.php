<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan locale Indonesia
        
        // Template judul aspirasi yang realistis
        $titleTemplates = [
            'Perbaikan {fasilitas} di {lokasi}',
            'Pembangunan {fasilitas} baru',
            'Peningkatan kualitas {layanan}',
            'Renovasi {fasilitas} {lokasi}',
            'Pengadaan {fasilitas} untuk masyarakat',
            'Pembersihan {area} secara rutin',
            'Penambahan {fasilitas} di {lokasi}',
            'Perbaikan sistem {sistem}',
            'Pemasangan {infrastruktur} baru',
            'Pengembangan {program} masyarakat'
        ];

        $fasilitas = ['jalan', 'drainase', 'lampu jalan', 'taman', 'masjid', 'sekolah', 'puskesmas', 'pasar', 'terminal', 'jembatan', 'gedung serbaguna', 'lapangan olahraga', 'perpustakaan', 'balai desa'];
        $lokasi = ['desa', 'kelurahan', 'kecamatan', 'RT 01', 'RT 02', 'kompleks perumahan', 'area industri', 'pusat kota', 'pinggiran', 'wilayah utara', 'wilayah selatan', 'zona komersial'];
        $layanan = ['kesehatan', 'pendidikan', 'transportasi', 'kebersihan', 'keamanan', 'air bersih', 'listrik', 'internet', 'pelayanan publik'];
        $sistem = ['drainase', 'keamanan', 'transportasi', 'informasi', 'pelayanan', 'kebersihan'];
        $infrastruktur = ['CCTV', 'lampu jalan', 'rambu lalu lintas', 'pagar', 'gerbang', 'pos jaga'];
        $program = ['pelatihan', 'pemberdayaan', 'kesehatan', 'pendidikan', 'ekonomi', 'sosial'];

        $data = [];
        
        for ($i = 0; $i < 50; $i++) {
            // Pilih template random
            $template = $faker->randomElement($titleTemplates);
            
            // Generate title berdasarkan template
            $title = $template;
            if (strpos($template, '{fasilitas}') !== false) {
                $title = str_replace('{fasilitas}', $faker->randomElement($fasilitas), $title);
            }
            if (strpos($title, '{lokasi}') !== false) {
                $title = str_replace('{lokasi}', $faker->randomElement($lokasi), $title);
            }
            if (strpos($title, '{layanan}') !== false) {
                $title = str_replace('{layanan}', $faker->randomElement($layanan), $title);
            }
            if (strpos($title, '{sistem}') !== false) {
                $title = str_replace('{sistem}', $faker->randomElement($sistem), $title);
            }
            if (strpos($title, '{infrastruktur}') !== false) {
                $title = str_replace('{infrastruktur}', $faker->randomElement($infrastruktur), $title);
            }
            if (strpos($title, '{program}') !== false) {
                $title = str_replace('{program}', $faker->randomElement($program), $title);
            }
            if (strpos($title, '{area}') !== false) {
                $title = str_replace('{area}', $faker->randomElement(['pasar', 'terminal', 'taman', 'jalan raya', 'kompleks', 'area parkir']), $title);
            }

            // Generate description yang lebih detail
            $description = $faker->paragraph(3) . ' ' . 
                          $faker->sentence() . ' ' . 
                          'Diharapkan dapat segera ditindaklanjuti untuk kesejahteraan masyarakat.';

            $data[] = [
                'title' => ucfirst($title),
                'description' => $description,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ];
        }

        // Insert data ke database
        DB::table('aspirations')->insert($data);
    }
}