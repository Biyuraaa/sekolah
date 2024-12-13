<?php

namespace Database\Factories;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => ParentModel::inRandomOrder()->first()->id ?? ParentModel::factory(),
            'amount' => $this->faker->randomFloat(2, 100000, 5000000),
            'purpose' => $this->faker->sentence,
            'proof_of_payment' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'rejected']),
        ];
    }
}
