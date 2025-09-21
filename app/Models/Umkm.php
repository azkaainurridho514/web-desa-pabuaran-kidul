<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkms';
    protected $fillable = [
        "status_id", "name", "owner", "description", "address", "longitude", "latitude", "phone", "reason", "photo"
    ];
}
