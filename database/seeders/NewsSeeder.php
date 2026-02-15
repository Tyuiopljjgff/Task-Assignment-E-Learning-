<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title_ar' => 'إطلاق دورات تدريبية جديدة للطلاب',
                'title_en' => 'Launch of New Training Courses for Students',
                'description_ar' => 'يسعدنا الإعلان عن إطلاق مجموعة جديدة من الدورات التدريبية المتخصصة في مختلف المجالات الأكاديمية.',
                'description_en' => 'We are pleased to announce the launch of a new set of specialized training courses in various academic fields.',
                'image' => 'news/training-courses.jpg',
                'date' => now()->format('Y-m-d'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'نتائج امتحانات الفصل الدراسي الأول',
                'title_en' => 'First Semester Exam Results',
                'description_ar' => 'تم الإعلان عن نتائج امتحانات الفصل الدراسي الأول. نهنئ جميع الطلاب المتفوقين ونتمنى للجميع التوفيق في الفصل القادم.',
                'description_en' => 'First semester exam results have been announced. We congratulate all outstanding students and wish everyone success in the next semester.',
                'image' => 'news/exam-results.jpg',
                'date' => now()->subDays(15)->format('Y-m-d'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'ورشة عمل حول مهارات الدراسة الفعالة',
                'title_en' => 'Workshop on Effective Study Skills',
                'description_ar' => 'ننظم ورشة عمل تفاعلية حول مهارات الدراسة الفعالة وإدارة الوقت. ستكون الورشة متاحة لجميع الطلاب عبر الإنترنت.',
                'description_en' => 'We are organizing an interactive workshop on effective study skills and time management. The workshop will be available to all students online.',
                'image' => 'news/study-skills-workshop.jpg',
                'date' => now()->subDays(25)->format('Y-m-d'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
    }
}
