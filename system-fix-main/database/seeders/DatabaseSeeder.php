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
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Roles
                // Roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Administrator
        $admin = $this->makeUser('Patience', 'patience@gmail.com', 'Administrator');

        // Lecturer
        $lecturer = $this->makeUser('Khalil', 'khalil@gmail.com', 'Lecturer');

        // Students
        $students = [];
        $studentData = [
            ['Macarthy',         'macarthy@gmail.com'],
            ['Aisha Nakato',     'aisha.nakato@example.com'],
            ['Brian Okello',     'brian.okello@example.com'],
            ['Grace Namukasa',   'grace.namukasa@example.com'],
            ['Daniel Ssemwanga', 'daniel.ssemwanga@example.com'],
        ];
        foreach ($studentData as [$name, $email]) {
            $students[] = $this->makeUser($name, $email, 'Student');
        }

        // Courses
        $course1 = Course::updateOrCreate(
            ['code' => 'BUC3131'],
            ['name' => 'Advanced Web Application Development', 'lecturer_id' => $lecturer->id]
        );
        $course2 = Course::updateOrCreate(
            ['code' => 'BIT2201'],
            ['name' => 'Database Systems', 'lecturer_id' => $lecturer->id]
        );
        Course::updateOrCreate(['code' => 'BIS2104'], ['name' => 'Information Systems']);
        Course::updateOrCreate(['code' => 'BSE3102'], ['name' => 'Software Engineering']);

        // Registrations: all 5 students in course 1, first 3 in course 2
        foreach ($students as $student) {
            Registration::firstOrCreate(['user_id' => $student->id, 'course_id' => $course1->id]);
        }
        foreach (array_slice($students, 0, 3) as $student) {
            Registration::firstOrCreate(['user_id' => $student->id, 'course_id' => $course2->id]);
        }
    }

    private function makeUser(string $name, string $email, string $role): User
    {
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make('password'),
                'role' => $role,
                'is_approved' => true,
                'approved_at' => now(),
            ]
        );

        $user->syncRoles($role);

        return $user;
    }
}