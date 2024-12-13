<?php

namespace Database\Factories;

use App\Models\ParentModel;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParentModel>
 */
class ParentModelFactory extends Factory
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
            'user_id' => User::factory()->parent(),
            'student_id' => Student::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ParentModel $parent) {
            // Create 12 payments for each parent
            Payment::factory(12)->create([
                'parent_id' => $parent->id,
            ]);
        });
    }
}
