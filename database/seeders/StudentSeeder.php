<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name_ar' => 'أحمد محمد علي',
                'name_en' => 'Ahmed Mohamed Ali',
                'email' => 'ahmed.ali@example.com',
                'phone' => '+966501234567',
                'academic_level_id' => 3, // High School
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'فاطمة أحمد حسن',
                'name_en' => 'Fatima Ahmed Hassan',
                'email' => 'fatima.hassan@example.com',
                'phone' => '+966502345678',
                'academic_level_id' => 2, // Middle School
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'محمد عبدالله سالم',
                'name_en' => 'Mohammed Abdullah Salem',
                'email' => 'mohammed.salem@example.com',
                'phone' => '+966503456789',
                'academic_level_id' => 3, // High School
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'سارة خالد محمود',
                'name_en' => 'Sarah Khaled Mahmoud',
                'email' => 'sarah.mahmoud@example.com',
                'phone' => '+966504567890',
                'academic_level_id' => 1, // Elementary School
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'عمر يوسف إبراهيم',
                'name_en' => 'Omar Youssef Ibrahim',
                'email' => 'omar.ibrahim@example.com',
                'phone' => '+966505678901',
                'academic_level_id' => 2, // Middle School
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('students')->insert($students);
    }
}