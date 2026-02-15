<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'icon',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationship: One academic level has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}