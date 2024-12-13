<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Exam;
use App\Models\Facility;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(ScheduleHourSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(SubjectSeeder::class);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@teacher.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        Teacher::create([
            'user_id' => $teacher->id,
            'position_id' => 1,
            'subject_id' => 1,
            'status' => 'active',
        ]);



        Teacher::factory(20)->create();

        ParentModel::factory(100)->create();

        Classroom::factory(50)->create();

        Exam::factory(20)->create();

        Facility::factory(50)->create();
    }
}
