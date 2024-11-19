<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $positions = [
            ['name' => 'Principal', 'base_salary' => 12000000, 'allowance' => 5000000, 'responsibilities' => 'Overall school management'],
            ['name' => 'Vice Principal - Curriculum', 'base_salary' => 10000000, 'allowance' => 4000000, 'responsibilities' => 'Supervise curriculum and teaching quality'],
            ['name' => 'Vice Principal - Administration', 'base_salary' => 10000000, 'allowance' => 4000000, 'responsibilities' => 'Manage school administration tasks'],
            ['name' => 'Vice Principal - Student Affairs', 'base_salary' => 10000000, 'allowance' => 4000000, 'responsibilities' => 'Handle student welfare and discipline'],
            ['name' => 'Senior Teacher', 'base_salary' => 8000000, 'allowance' => 3000000, 'responsibilities' => 'Lead teaching and mentor junior teachers'],
            ['name' => 'Subject Teacher - Mathematics', 'base_salary' => 7000000, 'allowance' => 2000000, 'responsibilities' => 'Teach Mathematics'],
            ['name' => 'Subject Teacher - English', 'base_salary' => 7000000, 'allowance' => 2000000, 'responsibilities' => 'Teach English'],
            ['name' => 'Subject Teacher - Science', 'base_salary' => 7000000, 'allowance' => 2000000, 'responsibilities' => 'Teach Science'],
            ['name' => 'Subject Teacher - History', 'base_salary' => 7000000, 'allowance' => 2000000, 'responsibilities' => 'Teach History'],
            ['name' => 'Subject Teacher - Physical Education', 'base_salary' => 7000000, 'allowance' => 2000000, 'responsibilities' => 'Teach Physical Education'],
            ['name' => 'Counselor', 'base_salary' => 7500000, 'allowance' => 2500000, 'responsibilities' => 'Provide student counseling and guidance'],
            ['name' => 'Librarian', 'base_salary' => 6000000, 'allowance' => 1500000, 'responsibilities' => 'Manage the school library'],
            ['name' => 'IT Specialist', 'base_salary' => 7500000, 'allowance' => 3000000, 'responsibilities' => 'Maintain school IT systems'],
            ['name' => 'Lab Assistant - Science', 'base_salary' => 5000000, 'allowance' => 1000000, 'responsibilities' => 'Assist in science laboratory activities'],
            ['name' => 'Administrative Staff', 'base_salary' => 5000000, 'allowance' => 1000000, 'responsibilities' => 'Assist in administrative tasks'],
            ['name' => 'Janitor', 'base_salary' => 3500000, 'allowance' => 500000, 'responsibilities' => 'Maintain cleanliness of the school'],
            ['name' => 'Security Guard', 'base_salary' => 4000000, 'allowance' => 500000, 'responsibilities' => 'Ensure school safety and security'],
            ['name' => 'Driver', 'base_salary' => 4000000, 'allowance' => 500000, 'responsibilities' => 'Drive school vehicles'],
            ['name' => 'Cafeteria Staff', 'base_salary' => 3500000, 'allowance' => 500000, 'responsibilities' => 'Manage school cafeteria operations'],
            ['name' => 'School Nurse', 'base_salary' => 6000000, 'allowance' => 2000000, 'responsibilities' => 'Provide health care services to students'],
        ];


        foreach ($positions as $position) {
            \App\Models\Position::create($position);
        }
    }
}
