<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potention extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'slug', 'title', 'description', 'photo'
    ];
}
