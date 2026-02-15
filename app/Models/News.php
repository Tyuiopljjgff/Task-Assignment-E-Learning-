<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'date',
        'is_active'
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}