<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobVacancySeeder extends Seeder
{
    public function run()
    {
        DB::table('job_vacancies')->insert([
            [
                'title' => 'Frontend Developer',
                'description' => 'Membangun tampilan website responsif dan user-friendly.',
                'location' => 'Jakarta',
                'salary_range' => 'Rp 7jt - 10jt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Mengelola logika server dan database aplikasi.',
                'location' => 'Bandung',
                'salary_range' => 'Rp 8jt - 12jt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'Mendesain UI yang menarik dan mudah digunakan.',
                'location' => 'Remote',
                'salary_range' => 'Negosiable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
