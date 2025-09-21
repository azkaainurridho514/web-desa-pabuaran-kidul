<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VisitorCategory;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors';

    protected $fillable = [
        'name',
        'nik',
        'category_id',
        'phone',
        'purpose',
        'rt',
        'rw',
        'street',
        'description',
        'start_date',
        'end_date',
        'date'
    ];

    // Optional: Cast dates
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(VisitorCategory::class,'category_id', 'id');
    }

}
