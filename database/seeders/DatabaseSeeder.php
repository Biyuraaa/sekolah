<?php

namespace Database\Seeders;

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

        // Teacher::create([
        //     'user_id' => $teacher->id,
        //     'position_id' => 1,
        //     'subject_id' => 1,
        //     'status' => 'active',
        // ]);



        Teacher::factory(10)->create();

        Student::factory(100)->create();

        $parent = User::factory()->create();
        ParentModel::create([
            'user_id' => $parent->id,
            'student_id' => 101,
        ]);
    }
}
