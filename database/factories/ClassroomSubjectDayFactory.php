<?php

namespace Database\Factories;

use App\Models\ClassroomSubject;
use App\Models\ScheduleHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassroomSubjectDay>
 */
class ClassroomSubjectDayFactory extends Factory
{
    protected $model = \App\Models\ClassroomSubjectDay::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'classroom_subject_id' => ClassroomSubject::factory(),
            'day' => $this->faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($classroomSubjectDay) {
            $availableHours = ScheduleHour::all();
            $totalHours = count($availableHours);

            $selectedHours = [];
            while (count($selectedHours) < rand(1, 2)) {
                $randomIndex = array_rand($availableHours->toArray());
                $hour = $availableHours[$randomIndex];
                if (count($selectedHours) == 0 || $hour->hour_number == $selectedHours[count($selectedHours) - 1]->hour_number + 1) {
                    $selectedHours[] = $hour;
                }
            }
            foreach ($selectedHours as $hour) {
                $classroomSubjectDay->classroomSubjectDayHours()->create([
                    'schedule_hour_id' => $hour->id,
                ]);
            }
        });
    }
}
