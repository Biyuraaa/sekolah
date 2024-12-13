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
            ],
            [
                'name' => 'Bahasa Indonesia',
                'description' => 'Mata pelajaran yang berfokus pada bahasa Indonesia dan keterampilan berbahasa.',
            ],
            [
                'name' => 'Fisika',
                'description' => 'Mata pelajaran yang mempelajari tentang hukum fisika, energi, dan materi.',
            ],
            [
                'name' => 'Kimia',
                'description' => 'Mata pelajaran yang membahas tentang materi kimia, unsur-unsur, dan reaksi kimia.',
            ],
            [
                'name' => 'Biologi',
                'description' => 'Mata pelajaran yang mempelajari tentang kehidupan, makhluk hidup, dan ekosistem.',
            ],
            [
                'name' => 'Bahasa Inggris',
                'description' => 'Mata pelajaran yang mengajarkan keterampilan berbahasa Inggris, baik lisan maupun tulisan.',
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Mata pelajaran yang mengajarkan sejarah dunia dan Indonesia.',
            ],
            [
                'name' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'description' => 'Mata pelajaran yang membahas tentang Pancasila, negara Indonesia, dan kewarganegaraan.',
            ],
            [
                'name' => 'Ekonomi',
                'description' => 'Mata pelajaran yang membahas teori ekonomi, sistem ekonomi, dan penerapan ekonomi dalam kehidupan.',
            ],
            [
                'name' => 'Seni Budaya',
                'description' => 'Mata pelajaran yang mengajarkan tentang seni rupa, seni musik, dan seni budaya lainnya.',
            ],
            [
                'name' => 'Geografi',
                'description' => 'Mata pelajaran yang mempelajari tentang permukaan bumi, fenomena alam, dan interaksi manusia dengan lingkungan.',
            ],
            [
                'name' => 'Sosiologi',
                'description' => 'Mata pelajaran yang mempelajari tentang masyarakat, interaksi sosial, dan fenomena sosial.',
            ],
            [
                'name' => 'Antropologi',
                'description' => 'Mata pelajaran yang mempelajari tentang manusia, budaya, dan kebudayaan di berbagai wilayah.',
            ],
            [
                'name' => 'Teknologi Informasi dan Komunikasi',
                'description' => 'Mata pelajaran yang berfokus pada penggunaan teknologi dan komunikasi modern.',
            ],
            [
                'name' => 'Prakarya dan Kewirausahaan',
                'description' => 'Mata pelajaran yang mengajarkan keterampilan prakarya dan dasar-dasar kewirausahaan.',
            ],
            [
                'name' => 'Matematika Tambahan',
                'description' => 'Mata pelajaran matematika dengan fokus pada pemahaman lanjutan seperti kalkulus dan statistik.',
            ],
            [
                'name' => 'Fisika Lanjutan',
                'description' => 'Mata pelajaran fisika tingkat lanjut untuk siswa yang mendalami bidang ini.',
            ],
            [
                'name' => 'Kimia Lanjutan',
                'description' => 'Mata pelajaran kimia lanjutan, mencakup teori dan praktik yang lebih mendalam.',
            ],
            [
                'name' => 'Biologi Lanjutan',
                'description' => 'Mata pelajaran biologi tingkat lanjut, mencakup studi tentang genetika dan bioteknologi.',
            ],
            [
                'name' => 'Agama',
                'description' => 'Mata pelajaran yang mempelajari tentang agama sesuai keyakinan siswa.',
            ],
            [
                'name' => 'Bimbingan Konseling',
                'description' => 'Mata pelajaran yang bertujuan membantu siswa dalam pengembangan diri dan pemecahan masalah.',
            ],
            [
                'name' => 'Olahraga',
                'description' => 'Mata pelajaran yang mengajarkan aktivitas fisik untuk menjaga kebugaran tubuh.',
            ],
            [
                'name' => 'Bahasa Asing Lainnya',
                'description' => 'Mata pelajaran yang mempelajari bahasa asing seperti Jepang, Mandarin, atau Jerman.',
            ],
            [
                'name' => 'Bahasa Inggris Wajib',
                'description' => 'Mata pelajaran Bahasa Inggris yang menjadi kurikulum wajib untuk semua siswa.',
            ],
            [
                'name' => 'Bahasa Inggris Peminatan',
                'description' => 'Mata pelajaran Bahasa Inggris dengan fokus yang lebih mendalam untuk siswa peminatan.',
            ],
            [
                'name' => 'Bahasa Jepang',
                'description' => 'Mata pelajaran yang mempelajari bahasa dan budaya Jepang.',
            ],
            [
                'name' => 'Bahasa Jerman',
                'description' => 'Mata pelajaran yang mempelajari bahasa dan budaya Jerman.',
            ],
        ]);
    }
}
