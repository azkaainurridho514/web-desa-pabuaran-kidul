<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footer';
    protected $fillable = [
        'address',
        'fb_link',
        'ig_link',
        'yt_link',
        'telepon',
        'whatsapp',
        'telepon_kantor',
        'senin_jumat',
        'sabtu_minggu'
    ];
}
