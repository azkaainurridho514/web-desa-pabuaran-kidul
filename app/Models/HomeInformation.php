<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeInformation extends Model
{
    use HasFactory;
    protected $table = 'home_information';
    protected $fillable = [
        'total_jiwa', 'total_laki_laki', 'total_perempuan', 'total_anak_anak',
        'total_remaja', 'total_dewasa', 'total_lansia', 'total_kepala_keluarga',
        'wilayah_administratif','jumlah_rt_rw',
    ];
}
