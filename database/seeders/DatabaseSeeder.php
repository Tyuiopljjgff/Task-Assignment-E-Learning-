<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            AcademicLevelSeeder::class,
            MajorSeeder::class,
            StudentSeeder::class,
            TestimonialSeeder::class,
            NewsSeeder::class,
        ]);
    }
}