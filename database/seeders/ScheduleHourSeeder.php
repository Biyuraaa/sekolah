<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $startHour = 6;
        $startMinute = 30;
        $lessonDuration = 45;
        $breaks = [
            4 => 30,
            7 => 45,
        ];
        $totalLessons = 10;

        $scheduleHours = [];
        for ($i = 1; $i <= $totalLessons; $i++) {
            $endHour = $startHour;
            $endMinute = $startMinute + $lessonDuration;
            if ($endMinute >= 60) {
                $endHour += 1;
                $endMinute -= 60;
            }

            $scheduleHours[] = [
                'hour_number' => $i,
                'start_time' => sprintf('%02d:%02d:00', $startHour, $startMinute),
                'end_time' => sprintf('%02d:%02d:00', $endHour, $endMinute),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $startHour = $endHour;
            $startMinute = $endMinute;

            if (isset($breaks[$i])) {
                $startMinute += $breaks[$i];
                if ($startMinute >= 60) {
                    $startHour += 1;
                    $startMinute -= 60;
                }
            }
        }

        DB::table('schedule_hours')->insert($scheduleHours);
    }
}
