<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('subjects')->insert([
            [
                'name' => 'Matematika',
                'description' => 'Mata pelajaran yang membahas tentang angka, operasi, dan konsep matematika lainnya.',
                'credit_hours' => 4,
            ],
            [
                'name' => 'Bahasa Indonesia',
                'description' => 'Mata pelajaran yang berfokus pada bahasa Indonesia dan keterampilan berbahasa.',
                'credit_hours' => 3,
            ],
            [
                'name' => 'Fisika',
                'description' => 'Mata pelajaran yang mempelajari tentang hukum fisika, energi, dan materi.',
                'credit_hours' => 4,
            ],
            [
                'name' => 'Kimia',
                'description' => 'Mata pelajaran yang membahas tentang materi kimia, unsur-unsur, dan reaksi kimia.',
                'credit_hours' => 4,
            ],
            [
                'name' => 'Biologi',
                'description' => 'Mata pelajaran yang mempelajari tentang kehidupan, makhluk hidup, dan ekosistem.',
                'credit_hours' => 4,
            ],
            [
                'name' => 'Bahasa Inggris',
                'description' => 'Mata pelajaran yang mengajarkan keterampilan berbahasa Inggris, baik lisan maupun tulisan.',
                'credit_hours' => 3,
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Mata pelajaran yang mengajarkan sejarah dunia dan Indonesia.',
                'credit_hours' => 3,
            ],
            [
                'name' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'description' => 'Mata pelajaran yang membahas tentang Pancasila, negara Indonesia, dan kewarganegaraan.',
                'credit_hours' => 2,
            ],
            [
                'name' => 'Ekonomi',
                'description' => 'Mata pelajaran yang membahas teori ekonomi, sistem ekonomi, dan penerapan ekonomi dalam kehidupan.',
                'credit_hours' => 3,
            ],
            [
                'name' => 'Seni Budaya',
                'description' => 'Mata pelajaran yang mengajarkan tentang seni rupa, seni musik, dan seni budaya lainnya.',
                'credit_hours' => 2,
            ],
        ]);
    }
}
