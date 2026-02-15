<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('job_position');
            $table->string('years_experience');
            $table->foreignId('major_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->string('cv_path');
            $table->enum('status', ['pending', 'reviewed', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_submissions');
    }
};