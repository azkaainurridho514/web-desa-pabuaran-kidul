<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicComplaint extends Model
{
    use HasFactory;
    protected $table = 'public_complaints';
    protected $fillable = [
        'title', 'description', 'category_id'
    ];
}
