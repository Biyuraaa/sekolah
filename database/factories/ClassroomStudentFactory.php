<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassroomStudent>
 */
class ClassroomStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $academicYear = $this->faker->randomElement(['2021/2022', '2022/2023', '2023/2024', '2024/2025']);
        $status = ($academicYear !== '2024/2025') ? 'graduated' : 'ongoing';

        $existingEntry = DB::table('classroom_students')
            ->where('student_id', Student::inRandomOrder()->first()->id)
            ->where('classroom_id', Classroom::inRandomOrder()->first()->id)
            ->first();


        while ($existingEntry) {
            $studentId = Student::inRandomOrder()->first()->id;
            $classroomId = Classroom::inRandomOrder()->first()->id;
            $existingEntry = DB::table('classroom_students')
                ->where('student_id', $studentId)
                ->where('classroom_id', $classroomId)
                ->first();
        }

        return [
            'student_id' => $studentId,
            'classroom_id' => $classroomId,
            'status' => $status,
        ];
    }
}
