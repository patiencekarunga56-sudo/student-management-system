<?php

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

test('student and course registration relationships return their related records', function () {
    $student = User::where('email', 'macarthy@gmail.com')->firstOrFail();
    $course = Course::where('code', 'BUC3131')->firstOrFail();

    expect($student->registrations)->not->toBeEmpty()
        ->and($student->courses->contains($course))->toBeTrue()
        ->and($course->students->contains($student))->toBeTrue()
        ->and($course->lecturer->email)->toBe('khalil@gmail.com');
});

test('students cannot view other students in course rosters', function () {
    $student = User::where('email', 'macarthy@gmail.com')->firstOrFail();
    $course = Course::where('code', 'BUC3131')->firstOrFail();

    $this->actingAs($student)
        ->get(route('courses.show', $course))
        ->assertOk()
        ->assertDontSee('aisha.nakato@example.com');
});

test('lecturers can view assigned rosters but cannot open unassigned course rosters', function () {
    $lecturer = User::where('email', 'khalil@gmail.com')->firstOrFail();
    $assignedCourse = Course::where('code', 'BUC3131')->firstOrFail();
    $unassignedCourse = Course::where('code', 'BIS2104')->firstOrFail();

    $this->actingAs($lecturer)
        ->get(route('courses.show', $assignedCourse))
        ->assertOk()
        ->assertSee('aisha.nakato@example.com');

    $this->get(route('courses.show', $unassignedCourse))->assertForbidden();
});

test('students cannot remove another student registration', function () {
    $student = User::where('email', 'macarthy@gmail.com')->firstOrFail();
    $otherStudent = User::where('email', 'aisha.nakato@example.com')->firstOrFail();
    $otherRegistration = Registration::where('user_id', $otherStudent->id)->firstOrFail();

    $this->actingAs($student)
        ->delete(route('registrations.destroy', $otherRegistration))
        ->assertForbidden();

    expect($otherRegistration->fresh())->not->toBeNull();
});

test('duplicate registrations are rejected without creating another row', function () {
    $student = User::where('email', 'macarthy@gmail.com')->firstOrFail();
    $course = Course::where('code', 'BUC3131')->firstOrFail();
    $registrationCount = Registration::where('user_id', $student->id)
        ->where('course_id', $course->id)
        ->count();

    $this->actingAs($student)
        ->post(route('registrations.store'), ['course_id' => $course->id])
        ->assertSessionHas('error');

    expect(Registration::where('user_id', $student->id)
        ->where('course_id', $course->id)
        ->count())->toBe($registrationCount);
});

test('administrators can register a selected student in a course', function () {
    $administrator = User::where('email', 'patience@gmail.com')->firstOrFail();
    $student = User::where('email', 'grace.namukasa@example.com')->firstOrFail();
    $course = Course::where('code', 'BIS2104')->firstOrFail();

    $this->actingAs($administrator)
        ->post(route('registrations.store'), [
            'user_id' => $student->id,
            'course_id' => $course->id,
        ])
        ->assertRedirect(route('registrations.index'));

    $this->assertDatabaseHas('registrations', [
        'user_id' => $student->id,
        'course_id' => $course->id,
    ]);
});

test('students cannot access administrator student management', function () {
    $student = User::where('email', 'macarthy@gmail.com')->firstOrFail();

    $this->actingAs($student)->get(route('students.index'))->assertForbidden();
});
