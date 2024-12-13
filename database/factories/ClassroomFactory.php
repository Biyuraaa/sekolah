<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "year_level" => $this->faker->randomElement(['10', '11', '12']),
            "group_numbers" => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            "batch_name" => $this->faker->word,
            "academic_year" => $this->faker->randomElement(['2021/2022', '2022/2023', '2023/2024', '2024/2025']),
            "teacher_id" => \App\Models\Teacher::inRandomOrder()->value('id'),
        ];
    }
}
