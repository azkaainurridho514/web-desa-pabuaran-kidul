<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmStatus extends Model
{
    use HasFactory;
      protected $table = 'umkm_statuses';
     protected $fillable = [
        'name', 
    ];
}
