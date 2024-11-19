<?php

namespace Database\Factories;

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
            //
            'user_id' => User::factory()->create()->id, // Membuat user baru dan mengambil ID-nya
            'subject_id' => $this->faker->randomNumber(1, 10),
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending', 'terminated', 'retired', 'on_leave']),
            "position_id" => $this->faker->randomNumber(1, 20),
            'is_certified' => $this->faker->boolean,
        ];
    }
}
