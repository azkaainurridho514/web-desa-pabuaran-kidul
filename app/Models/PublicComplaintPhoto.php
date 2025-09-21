<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicComplaintPhoto extends Model
{
    use HasFactory;
    protected $table = 'public_complaint_photos';
    protected $fillable = [
        'complaint_id', 'name'
    ];
}
