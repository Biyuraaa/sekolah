<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassroomSubject>
 */
class ClassroomSubjectFactory extends Factory
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
            'classroom_id' => Classroom::inRandomOrder()->value('id'),
            'subject_id' => Subject::inRandomOrder()->value('id'),
            'teacher_id' => Teacher::inRandomOrder()->value('id'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
