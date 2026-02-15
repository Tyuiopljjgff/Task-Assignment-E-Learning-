<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_position',
        'years_experience',
        'major_id',
        'full_name',
        'phone',
        'email',
        'cv_path',
        'status'
    ];

    // Relationship: Career submission belongs to major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}