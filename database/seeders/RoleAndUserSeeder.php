<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Roles
        $adminRole    = Role::firstOrCreate(['name' => 'Administrator']);
        $lecturerRole = Role::firstOrCreate(['name' => 'Lecturer']);
        $studentRole  = Role::firstOrCreate(['name' => 'Student']);

        // 2. Create Permissions
        $permissions = [
            'manage students',
            'manage courses',
            'manage registrations',
            'view assigned courses',
            'view available courses',
            'register courses'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole->syncPermissions(Permission::all());
        $lecturerRole->syncPermissions(['view assigned courses']);
        $studentRole->syncPermissions(['view available courses', 'register courses']);

        // 3. Seed Administrator
        $admin = User::firstOrCreate(
            ['email' => 'admin@mubs.ac.ug'],
            ['name' => 'System Admin', 'password' => Hash::make('Password123')]
        );
        $admin->assignRole($adminRole);

        // 4. Seed Lecturer
        $lecturer = User::firstOrCreate(
            ['email' => 'lecturer@mubs.ac.ug'],
            ['name' => 'Dr. Paul Mukasa', 'password' => Hash::make('Password123')]
        );
        $lecturer->assignRole($lecturerRole);

        // 5. Seed 5 Students (Question 2a)
        for ($i = 1; $i <= 5; $i++) {
            $studentUser = User::firstOrCreate(
                ['email' => "student{$i}@mubs.ac.ug"],
                ['name' => "Student {$i}", 'password' => Hash::make('Password123')]
            );
            $studentUser->assignRole($studentRole);

            $student = Student::firstOrCreate(
                ['user_id' => $studentUser->id],
                [
                    'student_number' => '202600' . $i,
                    'registration_number' => "26/U/{$i}00/EVE"
                ]
            );
        }

        // 6. Seed 4 Courses (Question 2a)
        $coursesData = [
            ['course_code' => 'BUC3131', 'course_name' => 'Advanced Web Application Development'],
            ['course_code' => 'BUC3132', 'course_name' => 'Database Administration'],
            ['course_code' => 'BUC3133', 'course_name' => 'Systems Analysis & Design'],
            ['course_code' => 'BUC3134', 'course_name' => 'E-Commerce Applications'],
        ];

        foreach ($coursesData as $c) {
            Course::firstOrCreate(
                ['course_code' => $c['course_code']],
                ['course_name' => $c['course_name'], 'lecturer_id' => $lecturer->id]
            );
        }

        // 7. Seed Course Registrations (Question 2c)
        $firstStudent = Student::first();
        $firstCourse = Course::first();
        $firstStudent->courses()->syncWithoutDetaching([$firstCourse->id]);
    }
}
    

