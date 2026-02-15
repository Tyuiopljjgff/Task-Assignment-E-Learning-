<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationship: One major has many career submissions
    public function careerSubmissions()
    {
        return $this->hasMany(CareerSubmission::class);
    }
}