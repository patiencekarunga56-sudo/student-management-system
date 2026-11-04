
<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Reset cached roles and create them if they don't exist
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        Role::firstOrCreate(['name' => 'Student', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Lecturer', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Administrator', 'guard_name' => 'web']);

        // 1. Create the Administrator
        $admin = User::create([
            'name' => 'Patience',
            'email' => 'patience@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Administrator',
            'is_approved' => true,
            'approved_at' => now(),
        ]);
        $admin->assignRole('Administrator');

        // 2. Create a Lecturer
        $lecturer = User::create([
            'name' => 'Khalil',
            'email' => 'khalil@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Lecturer',
            'is_approved' => true,
            'approved_at' => now(),
        ]);
        $lecturer->assignRole('Lecturer');

        // 3. Create 5 Students (Macarthy + 4 named students)
        $students = [];

        // Demo student (matches login.blade.php quick-login button)
        $macarthy = User::create([
            'name' => 'Macarthy',
            'email' => 'macarthy@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Student',
            'is_approved' => true,
            'approved_at' => now(),
        ]);
        $macarthy->assignRole('Student');
        $students[] = $macarthy;

        // 4 real-named filler students
        $fillerStudents = [
            ['name' => 'Aisha Nakato',    'email' => 'aisha.nakato@example.com'],
            ['name' => 'Brian Okello',    'email' => 'brian.okello@example.com'],
            ['name' => 'Grace Namukasa',  'email' => 'grace.namukasa@example.com'],
            ['name' => 'Daniel Ssemwanga','email' => 'daniel.ssemwanga@example.com'],
        ];

        foreach ($fillerStudents as $student) {
            $newStudent = User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password'),
                'role' => 'Student',
                'is_approved' => true,
                'approved_at' => now(),
            ]);
            $newStudent->assignRole('Student');
            $students[] = $newStudent;
        }

        // 4. Create 4 Courses (Assigning the first two to our Lecturer)
        $course1 = Course::create([
            'name' => 'Advanced Web Application Development',
            'code' => 'BUC3131',
            'lecturer_id' => $lecturer->id,
        ]);

        $course2 = Course::create([
            'name' => 'Database Systems',
            'code' => 'BIT2201',
            'lecturer_id' => $lecturer->id,
        ]);

        $course3 = Course::create([
            'name' => 'Information Systems',
            'code' => 'BIS2104',
        ]);

        $course4 = Course::create([
            'name' => 'Software Engineering',
            'code' => 'BSE3102',
        ]);

        // 5. Seed Course Registrations
        // Register all 5 students for Course 1
        foreach ($students as $student) {
            Registration::create([
                'user_id' => $student->id,
                'course_id' => $course1->id,
            ]);
        }

        // Register the first 3 students for Course 2
        for ($i = 0; $i < 3; $i++) {
            Registration::create([
                'user_id' => $students[$i]->id,
                'course_id' => $course2->id,
            ]);
        }
    }
}
