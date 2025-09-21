<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeJobInformation extends Model
{
    use HasFactory;
     protected $table = 'home_job_information';
    protected $fillable = ['name', 'total', 'percent'];
}
