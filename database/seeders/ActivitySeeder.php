<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kegiatanTemplates = [
            'Gotong Royong Pembersihan {lokasi}',
            'Pelatihan {skill} untuk {target}',
            'Festival {acara} Desa Pabuaran Kidul',
            'Pembangunan {infrastruktur} {lokasi}',
            'Sosialisasi {program} kepada Masyarakat',
            'Kerja Bakti {kegiatan} Lingkungan',
            'Workshop {topik} untuk {sasaran}',
            'Penyuluhan {bidang} bagi {kelompok}',
            'Lomba {kompetisi} Tingkat Desa',
            'Pengajian dan {kegiatan_religi}',
            'Rapat {jenis_rapat} {periode}',
            'Vaksinasi {jenis_vaksin} Massal',
            'Pemeriksaan Kesehatan {sasaran}',
            'Penanaman {tanaman} di {area}',
            'Bazar {produk} Lokal Desa'
        ];
        $lokasi = ['Balai Desa', 'Masjid Al-Ikhlas', 'Lapangan Desa', 'Hall Serbaguna', 'Pos Ronda RT 01', 'Area Persawahan', 'Jalan Desa', 'Sungai Cisanggarung', 'Tambak Ikan', 'Pasar Desa'];
        $skill = ['Budidaya Ikan Lele', 'Pertanian Organik', 'Kerajinan Tangan', 'Teknologi Digital', 'Kewirausahaan', 'Menjahit', 'Tata Boga', 'Sablon', 'Las Listrik', 'Otomotif'];
        $target = ['Ibu-ibu PKK', 'Pemuda Karang Taruna', 'Petani', 'Nelayan', 'UMKM', 'Lansia', 'Remaja Masjid', 'Guru PAUD', 'Kader Posyandu', 'Warga'];
        $acara = ['Seni Budaya', 'Kuliner', 'Panen Raya', 'Kemerdekaan', 'Ramadan', 'Idul Fitri', 'Muharram', 'Maulid Nabi', 'Srawung Desa', 'Haflah Quran'];
        $infrastruktur = ['Jalan', 'Jembatan', 'Saluran Irigasi', 'Pos Kamling', 'Musholla', 'Posyandu', 'PAUD', 'Perpustakaan', 'Balai Pertemuan', 'MCK Umum'];
        $program = ['BLT Desa', 'Kartu Prakerja', 'BPJS Kesehatan', 'KUR', 'Bantuan Sosial', 'Program KB', 'Stunting', 'Gerakan 1000 Hari', 'Dana Desa', 'Prona'];
        $kegiatan = ['Pembersihan Selokan', 'Penanaman Pohon', 'Pengecatan Pos Ronda', 'Perbaikan Jalan', 'Pembersihan Masjid', 'Normalisasi Sungai'];
        $topik = ['Teknologi Pertanian', 'Digital Marketing', 'Pengolahan Sampah', 'Kesehatan Keluarga', 'Literasi Keuangan', 'Manajemen Usaha'];
        $sasaran = ['Petani Milenial', 'Ibu Rumah Tangga', 'Pelaku UMKM', 'Remaja Desa', 'Lansia Aktif', 'Kader Desa'];
        $bidang = ['Kesehatan Reproduksi', 'Gizi Balita', 'Pertanian Ramah Lingkungan', 'Kewirausahaan', 'Literasi Digital', 'Pencegahan Stunting'];
        $kelompok = ['Ibu Hamil dan Menyusui', 'Balita dan Batita', 'Remaja Putri', 'Lansia', 'Penyandang Disabilitas', 'Keluarga Prasejahtera'];
        $kompetisi = ['Baca Quran', 'Masak Tradisional', 'Tari Saman', 'Futsal', 'Voli', 'Cerdas Cermat', 'Pidato Bahasa Indonesia', 'Kaligrafi'];
        $kegiatan_religi = ['Ceramah Agama', 'Tadarus Al-Quran', 'Dzikir Bersama', 'Kajian Fiqh', 'Sholawat Nabi', 'Tahlil Akbar'];
        $jenis_rapat = ['Koordinasi BPD', 'Evaluasi Program', 'Musyawarah Desa', 'Tim Pelaksana', 'Koordinasi RT/RW', 'Perencanaan APBDes'];
        $periode = ['Triwulan I', 'Triwulan II', 'Triwulan III', 'Triwulan IV', 'Semester I', 'Semester II', 'Tahunan', 'Bulanan'];
        $jenis_vaksin = ['COVID-19 Booster', 'Hepatitis B', 'Tetanus', 'Polio', 'Campak', 'DPT', 'HPV'];
        $tanaman = ['Pohon Mahoni', 'Bambu', 'Pohon Trembesi', 'Mangrove', 'Sayuran Organik', 'Cabai', 'Tomat', 'Kangkung'];
        $area = ['Bantaran Sungai', 'Area RTH', 'Halaman Balai Desa', 'Lahan Kosong', 'Pinggir Jalan', 'Area Pemakaman'];
        $produk = ['Kerajinan Anyaman', 'Hasil Pertanian', 'Makanan Tradisional', 'Ikan Segar', 'Emping Melinjo', 'Kerupuk Ikan'];
        $data = [];
        for ($i = 0; $i < 30; $i++) {
            $template = $faker->randomElement($kegiatanTemplates);
            $title = $template;
            $replacements = [
                '{lokasi}' => $faker->randomElement($lokasi),
                '{skill}' => $faker->randomElement($skill),
                '{target}' => $faker->randomElement($target),
                '{acara}' => $faker->randomElement($acara),
                '{infrastruktur}' => $faker->randomElement($infrastruktur),
                '{program}' => $faker->randomElement($program),
                '{kegiatan}' => $faker->randomElement($kegiatan),
                '{topik}' => $faker->randomElement($topik),
                '{sasaran}' => $faker->randomElement($sasaran),
                '{bidang}' => $faker->randomElement($bidang),
                '{kelompok}' => $faker->randomElement($kelompok),
                '{kompetisi}' => $faker->randomElement($kompetisi),
                '{kegiatan_religi}' => $faker->randomElement($kegiatan_religi),
                '{jenis_rapat}' => $faker->randomElement($jenis_rapat),
                '{periode}' => $faker->randomElement($periode),
                '{jenis_vaksin}' => $faker->randomElement($jenis_vaksin),
                '{tanaman}' => $faker->randomElement($tanaman),
                '{area}' => $faker->randomElement($area),
                '{produk}' => $faker->randomElement($produk)
            ];

            foreach ($replacements as $placeholder => $replacement) {
                $title = str_replace($placeholder, $replacement, $title);
            }
            $proposalDate = $faker->dateTimeBetween('-2 months', '+6 months');
            $startDate = $faker->dateTimeBetween($proposalDate, '+8 months');
            $endDate = $faker->boolean(70) ? 
                       $faker->dateTimeBetween($startDate, $startDate->format('Y-m-d') . ' +7 days') : 
                       null;
            $descriptions = [
                "Kegiatan ini bertujuan untuk meningkatkan kesejahteraan dan keterampilan masyarakat desa. Diharapkan seluruh warga dapat berpartisipasi aktif dalam pelaksanaan kegiatan ini.",
                "Dalam rangka pembangunan desa yang berkelanjutan, kegiatan ini menjadi bagian penting dari program kerja desa tahun ini. Target peserta adalah seluruh lapisan masyarakat.",
                "Kegiatan ini merupakan wujud implementasi dari visi misi desa untuk menciptakan masyarakat yang mandiri dan sejahtera melalui pemberdayaan masyarakat.",
                "Sebagai upaya peningkatan kapasitas SDM desa, kegiatan ini diharapkan dapat memberikan dampak positif bagi kemajuan desa Pabuaran Kidul.",
                "Program ini dilaksanakan dalam rangka mewujudkan desa yang maju, mandiri, dan religius sesuai dengan nilai-nilai luhur budaya Cirebon."
            ];
            $description = $faker->randomElement($descriptions) . ' ' . 
                          $faker->paragraph(2) . ' ' .
                          "Waktu pelaksanaan akan diinformasikan lebih lanjut kepada seluruh warga melalui pengumuman resmi.";
            $data[] = [
                'title' => ucfirst($title),
                'start_date' => $startDate,
                'end_date' => $endDate,
                'description' => $description,
                'date' => $proposalDate,
                'created_at' => $faker->dateTimeBetween('-3 months', 'now'),
                'updated_at' => now(),
            ];
        }
        DB::table('activities')->insert($data);
    }
}