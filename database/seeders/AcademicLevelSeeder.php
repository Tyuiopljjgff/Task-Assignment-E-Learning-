<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name_ar' => 'المرحلة الابتدائية',
                'name_en' => 'Elementary School',
            
                'is_active' => true,
            ],
            [
                'name_ar' => 'المرحلة المتوسطة',
                'name_en' => 'Middle School',
                
                'is_active' => true,
            ],
            [
                'name_ar' => 'المرحلة الثانوية',
                'name_en' => 'High School',
                'is_active' => true,
            ],
        ];

        DB::table('academic_levels')->insert($levels);
    }
}