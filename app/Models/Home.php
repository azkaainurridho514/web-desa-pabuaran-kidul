<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'home';
    
    protected $fillable = [
        'title_nav',
        'title_header',
        'visi',
        'misi',
        'sejarah',
        'batas_desa_utara',
        'batas_desa_timur',
        'batas_desa_selatan',
        'batas_desa_barat',
        'maps',
        'logo',
        'sambutan_kepala_desa',
        'video_profile_title',
        'video_profile_link',
        'stok_photo',
    ];

    protected $casts = [
        'jumlah_penduduk' => 'integer',
        'luas_desa' => 'decimal:2',
        'stok_photo' => 'integer'
    ];
}
