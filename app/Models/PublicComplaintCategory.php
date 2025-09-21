<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicComplaintCategory extends Model
{
    use HasFactory;
    protected $table = 'public_complaint_categories';
    protected $fillable = [
        'name'
    ];
}
