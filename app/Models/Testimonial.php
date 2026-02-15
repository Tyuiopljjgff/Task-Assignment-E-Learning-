<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name_ar',
        'student_name_en',
        'course_ar',
        'course_en',
        'text_ar',
        'text_en',
        'image',
        'color',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}