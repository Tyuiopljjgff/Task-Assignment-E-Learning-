<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'academic_level_id'
    ];

    // Relationship: Student belongs to academic level
    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class);
    }
}