<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => Subject::inRandomOrder()->value('id'),
            'type' => $this->faker->randomElement(['uts', 'uas']),
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'academic_year' => $this->faker->randomElement(['2021/2022', '2022/2023', '2023/2024', '2024/2025']), // Pilih tahun akademik secara acak
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
