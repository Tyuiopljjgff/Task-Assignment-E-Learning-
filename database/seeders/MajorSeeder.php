<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'name_ar' => 'الرياضيات',
                'name_en' => 'Mathematics',
               
                'is_active' => true,
            ],
            [
                'name_ar' => 'العلوم',
                'name_en' => 'Science',
              
                'is_active' => true,
            ],
            [
                'name_ar' => 'الفيزياء',
                'name_en' => 'Physics',
               
                'is_active' => true,
            ],
            [
                'name_ar' => 'الكيمياء',
                'name_en' => 'Chemistry',
               
                'is_active' => true,
            ],
            [
                'name_ar' => 'الأحياء',
                'name_en' => 'Biology',
                
                'is_active' => true,
            ],
            [
                'name_ar' => 'اللغة العربية',
                'name_en' => 'Arabic Language',
                
                'is_active' => true,
            ],
            [
                'name_ar' => 'اللغة الإنجليزية',
                'name_en' => 'English Language',
                
                'is_active' => true,
            ],
            [
                'name_ar' => 'الدراسات الاجتماعية',
                'name_en' => 'Social Studies',
               
                'is_active' => true,
            ],
            [
                'name_ar' => 'علوم الحاسب',
                'name_en' => 'Computer Science',
                
                'is_active' => true,
            ],
            [
                'name_ar' => 'الفنون',
                'name_en' => 'Arts',
               
                'is_active' => true,
            ],
        ];

        DB::table('majors')->insert($majors);
    }
}