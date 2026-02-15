<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'student_name_ar' => 'أحمد محمد علي',
                'student_name_en' => 'Ahmed Mohamed Ali',
                'course_ar' => 'الرياضيات',
                'course_en' => 'Mathematics',
                'text_ar' => 'المنصة التعليمية ساعدتني كثيراً في تحسين مستواي الدراسي.',
                'text_en' => 'The educational platform helped me greatly improve my academic performance.',
                'image' => null,
                'color' => 'blue',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name_ar' => 'فاطمة أحمد حسن',
                'student_name_en' => 'Fatima Ahmed Hassan',
                'course_ar' => 'العلوم',
                'course_en' => 'Science',
                'text_ar' => 'أعجبني التنوع في طرق التدريس والاختبارات التفاعلية.',
                'text_en' => 'I loved the variety in teaching methods and interactive tests.',
                'image' => null,
                'color' => 'green',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_name_ar' => 'محمد عبدالله سالم',
                'student_name_en' => 'Mohammed Abdullah Salem',
                'course_ar' => 'الفيزياء',
                'course_en' => 'Physics',
                'text_ar' => 'المعلمون متميزون ومتعاونون.',
                'text_en' => 'The teachers are excellent and cooperative.',
                'image' => null,
                'color' => 'orange',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('testimonials')->insert($testimonials);
    }
}
