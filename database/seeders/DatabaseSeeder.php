<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Home;
use App\Models\HomeInformation;
use App\Models\Footer;
use App\Models\UmkmStatus;
use App\Models\Umkm;
use App\Models\Visitor;
use App\Models\VisitorCategory;
use App\Models\HomeJobInformation;
use Illuminate\Support\Facades\DB;
use App\Models\PublicComplaint;
use App\Models\PublicComplaintCategory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'akun example admin',
            'email' => 'admin@gmail.com',
            'phone' => '083833839299',
            'password' => Hash::make('admin'),
        ]);
        UmkmStatus::create([
            'id'=>'1',
            'name' => 'Permintaan',
        ]);
        UmkmStatus::create([
            'id'=>'2',
            'name' => 'Di Setujui',
        ]);
        UmkmStatus::create([
            'id'=>'3',
            'name' => 'Di Tolak',
        ]);
        DB::table('umkms')->insert([
            [
                'status_id' => '1',
                'name' => 'Warung Makan Bu Siti',
                'owner' => 'Ibu Siti Aminah',
                'description' => 'Warung makan yang menyediakan nasi gudeg, soto ayam, dan berbagai lauk pauk tradisional dengan cita rasa khas Cirebon.',
                'address' => 'RT 02 RW 01, Dusun Krajan, Desa Pabuaran Kidul',
                'longitude' => '108.489123',
                'latitude' => '-6.745612',
                'phone' => '081234567890',
                'reason' => 'Menambah penghasilan keluarga dan memanfaatkan keahlian memasak',
                'photo' => 'warung-bu-siti.jpg',

            ],
            [
                'status_id' => '2',
                'name' => 'Toko Kelontong Berkah',
                'owner' => 'Bapak Sutarno',
                'description' => 'Toko kelontong lengkap yang menyediakan kebutuhan sehari-hari warga desa, mulai dari beras, gula, minyak goreng hingga perlengkapan rumah tangga.',
                'address' => 'RT 01 RW 01, Dusun Krajan, Desa Pabuaran Kidul',
                'longitude' => '108.487456',
                'latitude' => '-6.744789',
                'phone' => '081298765432',
                'reason' => 'Melayani kebutuhan warga desa dan menciptakan lapangan kerja',
                'photo' => 'toko-berkah.jpg',

            ],
            [
                'status_id' => '2',
                'name' => 'Kerajinan Anyaman Pandan Mandiri',
                'owner' => 'Ibu Wati Suryani',
                'description' => 'Usaha kerajinan anyaman dari pandan yang menghasilkan tas, topi, tempat nasi, dan souvenir khas daerah Cirebon.',
                'address' => 'RT 05 RW 02, Dusun Tengah, Desa Pabuaran Kidul',
                'longitude' => '108.491234',
                'latitude' => '-6.747890',
                'phone' => '085234567891',
                'reason' => 'Melestarikan budaya lokal dan memberdayakan ibu-ibu PKK',
                'photo' => 'anyaman-pandan.jpg',

            ],
            [
                'status_id' => '1',
                'name' => 'Budidaya Ikan Lele Pak Agus',
                'owner' => 'Bapak Agus Setiawan',
                'description' => 'Usaha budidaya ikan lele dalam kolam terpal dengan sistem bioflok untuk menghasilkan ikan lele berkualitas tinggi.',
                'address' => 'RT 08 RW 03, Dusun Timur, Desa Pabuaran Kidul',
                'longitude' => '108.493567',
                'latitude' => '-6.749123',
                'phone' => '082345678912',
                'reason' => 'Memanfaatkan lahan kosong dan mengembangkan sektor perikanan desa',
                'photo' => 'budidaya-lele.jpg',

            ],
            [
                'status_id' => '2',
                'name' => 'Warung Kopi Nusantara',
                'owner' => 'Bapak Dedi Kurniawan',
                'description' => 'Warung kopi yang menyajikan kopi robusta lokal dengan berbagai varian rasa, dilengkapi camilan tradisional dan wifi gratis.',
                'address' => 'RT 03 RW 02, Dusun Tengah, Desa Pabuaran Kidul',
                'longitude' => '108.490789',
                'latitude' => '-6.746456',
                'phone' => '083456789123',
                'reason' => 'Menyediakan tempat berkumpul warga dan mempromosikan kopi lokal',
                'photo' => 'warung-kopi-nusantara.jpg',

            ],
            [
                'status_id' => '1',
                'name' => 'Bengkel Motor Jaya',
                'owner' => 'Bapak Joko Widodo',
                'description' => 'Bengkel motor yang melayani service rutin, ganti oli, perbaikan mesin, dan penjualan spare part motor berbagai merk.',
                'address' => 'RT 10 RW 04, Dusun Barat, Desa Pabuaran Kidul',
                'longitude' => '108.485234',
                'latitude' => '-6.748567',
                'phone' => '084567891234',
                'reason' => 'Memanfaatkan keahlian teknik dan melayani kebutuhan transportasi warga',
                'photo' => 'bengkel-jaya.jpg',

            ],
            [
                'status_id' => '2',
                'name' => 'Kerupuk Ikan Bu Eka',
                'owner' => 'Ibu Eka Wahyuni',
                'description' => 'Produksi kerupuk ikan segar dengan bahan baku ikan hasil tangkapan lokal, dikemas higienis dan tahan lama.',
                'address' => 'RT 06 RW 03, Dusun Timur, Desa Pabuaran Kidul',
                'longitude' => '108.492890',
                'latitude' => '-6.747234',
                'phone' => '085678912345',
                'reason' => 'Mengolah hasil perikanan menjadi produk bernilai tambah',
                'photo' => 'kerupuk-ikan.jpg',

            ],
            [
                'status_id' => '3',
                'name' => 'Salon Cantik Permata',
                'owner' => 'Ibu Nurhayati',
                'description' => 'Salon kecantikan yang melayani potong rambut, creambath, facial, dan perawatan kuku untuk pria dan wanita.',
                'address' => 'RT 04 RW 02, Dusun Tengah, Desa Pabuaran Kidul',
                'longitude' => '108.490123',
                'latitude' => '-6.746890',
                'phone' => '086789123456',
                'reason' => 'Menyediakan layanan kecantikan untuk warga desa',
                'photo' => 'salon-permata.jpg',

            ],
            [
                'status_id' => '2',
                'name' => 'Emping Melinjo Pak Bambang',
                'owner' => 'Bapak Bambang Sutrisno',
                'description' => 'Produksi emping melinjo dengan kualitas premium, dibuat secara tradisional dan dikemas modern untuk pasar lokal dan luar daerah.',
                'address' => 'RT 09 RW 04, Dusun Barat, Desa Pabuaran Kidul',
                'longitude' => '108.486789',
                'latitude' => '-6.748123',
                'phone' => '087891234567',
                'reason' => 'Mengembangkan produk unggulan daerah dan menciptakan brand lokal',
                'photo' => 'emping-melinjo.jpg',

            ],
            [
                'status_id' => '1',
                'name' => 'Cuci Motor Bersih',
                'owner' => 'Bapak Yudi Hermawan',
                'description' => 'Jasa cuci motor dan mobil dengan fasilitas steam, vacuum, dan poles untuk menjaga kendaraan tetap bersih dan terawat.',
                'address' => 'RT 11 RW 04, Dusun Barat, Desa Pabuaran Kidul',
                'longitude' => '108.484567',
                'latitude' => '-6.749456',
                'phone' => '088912345678',
                'reason' => 'Menyediakan jasa kebersihan kendaraan dan menciptakan usaha mandiri',
                'photo' => 'cuci-motor-bersih.jpg',

            ]
        ]);
        PublicComplaintCategory::create([
            'id'=>'1',
            'name' => 'Kebersihan',
        ]);
        PublicComplaintCategory::create([
            'id'=>'2',
            'name' => 'Kerapihan',
        ]);
        PublicComplaint::create([
            'title' => 'Komplen dlu yaa',
            'category_id' => '1',
            'description' => 'descriptionnnnnnn',
        ]);
        PublicComplaint::create([
            'title' => 'Komplen dlu yaa ini nya',
            'category_id' => '1',
            'description' => 'descriptionnnnnnn',
        ]);
        PublicComplaint::create([
            'title' => 'Komplen dlu yaa ada dua',
            'category_id' => '2',
            'description' => 'descriptionnnnnnn',
        ]);

        Home::create([
            'title_nav' => 'Desa Pabuaran Kidul',
            'title_header' => 'Selamat Datang di Desa Pabuaran Kidul',
            'visi' => 'Terwujudnya Desa Pabuaran Kidul yang maju, mandiri, sejahtera, dan religius berdasarkan nilai-nilai gotong royong, kearifan lokal budaya Cirebon, dan ajaran Islam.',
            'misi' => 'Meningkatkan kualitas pelayanan publik yang prima, transparan, dan berbasis teknologi; Mengembangkan potensi ekonomi kerakyatan berbasis pertanian, perikanan, dan UMKM; Membangun infrastruktur desa yang mendukung kesejahteraan dan aksesibilitas masyarakat; Melestarikan budaya Cirebon dan menciptakan lingkungan yang bersih, sehat, dan islami; Memberdayakan masyarakat melalui pendidikan, pelatihan keterampilan, dan pengajian rutin.',
            'sejarah' => 'Desa Pabuaran Kidul merupakan salah satu desa di wilayah Kabupaten Cirebon yang memiliki sejarah panjang sebagai kawasan pertanian dan perikanan. Nama "Pabuaran" berasal dari kata "Buar" yang dalam bahasa Cirebon berarti tempat yang subur, sedangkan "Kidul" berarti selatan. Desa ini berkembang sejak masa Kesultanan Cirebon dan menjadi salah satu penyuplai hasil pertanian untuk kerajaan. Masyarakat desa ini dikenal dengan tradisi gotong royong yang kuat, budaya pesantren, dan keahlian dalam bidang pertanian padi serta budidaya ikan. Seiring perkembangan zaman, desa ini terus mempertahankan nilai-nilai tradisional sambil mengadopsi teknologi modern untuk meningkatkan kesejahteraan masyarakat.',
            'batas_desa_utara' => 'Berbatasan dengan Desa Pabuaran Lor dan Sungai Cisanggarung',
            'batas_desa_timur' => 'Berbatasan dengan Desa Karangmulya dan area persawahan',
            'batas_desa_selatan' => 'Berbatasan dengan Desa Babakan dan Jalan Provinsi Cirebon-Kuningan',
            'batas_desa_barat' => 'Berbatasan dengan Desa Sindangjawa dan area tambak ikan',
            // 'jumlah_penduduk' => '4.156 jiwa',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.845612340!2d108.489123456!3d-6.745612340!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e5a8b9c2d3e%3A0x4f5g6h7i8j9k0l1m!2sPabuaran+Kidul%2C+Cirebon!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid',
            'logo' => 'logo-desa-pabuaran-kidul.png',
            'sambutan_kepala_desa' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh dan salam sejahtera untuk seluruh warga Desa Pabuaran Kidul yang saya cintai. Alhamdulillahirabbil\'alamiin, puji syukur kita panjatkan kepada Allah SWT atas segala nikmat dan karunia-Nya sehingga kita dapat bersama-sama membangun desa kita tercinta ini. Sebagai Kepala Desa, saya mengajak seluruh masyarakat untuk terus menjaga kerukunan, melestarikan budaya Cirebon, dan bergotong royong dalam pembangunan. Mari kita manfaatkan potensi pertanian, perikanan, dan kearifan lokal yang kita miliki untuk menciptakan lapangan kerja dan meningkatkan kesejahteraan bersama. Dengan menjunjung tinggi nilai-nilai islami dan budaya leluhur, saya yakin Desa Pabuaran Kidul akan menjadi desa yang baldatun thayyibatun wa rabbun ghafur - negeri yang baik dan Tuhan Yang Maha Pengampun. Barakallahu fiikum wa jazakumullahu khairan.',
            'video_profile_title' => 'Profil Desa Pabuaran Kidul - Pesona Budaya Cirebon',
            'video_profile_link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'stok_photo' => 'galeri-desa-pabuaran-kidul.jpg',
        ]);

        HomeInformation::create([
            'total_jiwa' => '4,156',
            'total_laki_laki' => '2,089',
            'total_perempuan' => '2,067',
            'total_anak_anak' => '1,024',
            'total_remaja' => '798',
            'total_dewasa' => '1,892',
            'total_orang_tua' => '442',
            'total_kepala_keluarga' => '1,147',
            'wilayah_administratif' => '312 Ha',
            // 'luas_desa' => '312 Ha',
            "jumlah_rt_rw" => "12 RT, 4 RW, 5 Dusun"
        ]);
        HomeJobInformation::create([
            'name' => 'Pedagang UMKM',
            'total' => '144',
            'percent' => '88%',
        ]);

        Footer::create([
            'address' => 'Jl. Raya Pabuaran Kidul No. 45, RT 03/RW 02, Desa Pabuaran Kidul, Kecamatan Kapetakan, Kabupaten Cirebon, Jawa Barat 45152',
            'fb_link' => 'https://www.facebook.com/DesaPabuaranKidulOfficial',
            'ig_link' => 'https://www.instagram.com/pabuarankidul_official',
            'yt_link' => 'https://www.youtube.com/@DesaPabuaranKidul',
            'telepon' => '+62 231 8765432',
            'whatsapp' => '+62 812 2345 6789',
            'telepon_kantor' => '+62 231 8765433',
            'senin_jumat' => '07:30 - 15:30 WIB',
            'sabtu_minggu' => '07:30 - 11:30 WIB',
        ]);
        $this->call([
            AspirationSeeder::class,
            ActivitySeeder::class,
        ]);
        VisitorCategory::create([
            'name' => 'Kunjungan Keluarga',
        ]);
        VisitorCategory::create([
            'name' => 'Wisata',
        ]);
        VisitorCategory::create([
            'name' => 'Pendidikan',
        ]);
        VisitorCategory::create([
            'name' => 'Kesehatan',
        ]);
        VisitorCategory::create([
            'name' => 'Bertamu',
        ]);
        Visitor::create([
            "category_id" => "2",
            'name' => 'John Doe',
            'nik' => '3201234567890123',
            'phone' => '081234567890',
            'rt' => '001',
            'rw' => '005',
            'street' => 'Jl. Merdeka No. 10',
            'description' => 'Mengunjungi keluarga untuk silaturahmi dan acara keluarga.',
            'start_date' => '2024-08-08',
            'end_date' => '2024-08-10',
        ]);

        Visitor::create([
            "category_id" => "1",
            'name' => 'Jane Smith',
            'nik' => '3201234567890124',
            'phone' => '081234567891',
            'rt' => '002',
            'rw' => '003',
            'street' => 'Jl. Sudirman No. 25',
            'description' => 'Meeting bisnis dengan partner lokal untuk pengembangan usaha.',
            'start_date' => '2024-08-09',
            'end_date' => '2024-08-09',
        ]);

        Visitor::create([
            "category_id" => "4",
            'name' => 'Budi Santoso',
            'nik' => '3201234567890127',
            'phone' => '081234567894',
            'rt' => '005',
            'rw' => '001',
            'street' => 'Jl. Kesehatan No. 20',
            'description' => 'Konsultasi kesehatan dan pemeriksaan rutin di fasilitas kesehatan setempat.',
            'start_date' => '2024-08-12',
            'end_date' => '2024-08-12',
        ]);

    }
}
