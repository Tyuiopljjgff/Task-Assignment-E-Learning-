<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name_ar' => 'جامعة القاهرة',
                'name_en' => 'Cairo University',
                'logo' => 'partners/cairo-university.png',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name_ar' => 'وزارة التربية والتعليم',
                'name_en' => 'Ministry of Education',
                'logo' => 'partners/ministry-education.png',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name_ar' => 'مؤسسة التعليم الرقمي',
                'name_en' => 'Digital Education Foundation',
                'logo' => 'partners/digital-education.png',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name_ar' => 'مركز التطوير التعليمي',
                'name_en' => 'Educational Development Center',
                'logo' => 'partners/edu-development.png',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name_ar' => 'الأكاديمية الدولية للتعليم',
                'name_en' => 'International Academy of Education',
                'logo' => 'partners/international-academy.png',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name_ar' => 'معهد البحوث التربوية',
                'name_en' => 'Institute of Educational Research',
                'logo' => 'partners/research-institute.png',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        DB::table('partners')->insert($partners);
    }
}