<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('student_name_ar');
            $table->string('student_name_en');
            $table->string('course_ar');
            $table->string('course_en');
            $table->text('text_ar');
            $table->text('text_en');
            $table->string('image')->nullable();
            $table->enum('color', ['green', 'orange', 'blue'])->default('blue');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};