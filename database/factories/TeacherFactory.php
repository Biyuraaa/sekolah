<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->teacher(),
            'subject_id' => Subject::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending', 'terminated', 'retired', 'on_leave']),
            'position_id' => Position::inRandomOrder()->first()->id,
        ];
    }
}
