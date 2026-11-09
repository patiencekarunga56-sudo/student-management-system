<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CourseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('permission:manage courses', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        $coursesQuery = Course::with('lecturer');

        if (auth()->user()->hasRole('Lecturer')) {
            $coursesQuery->where('lecturer_id', auth()->id());
        }

        $courses = $coursesQuery->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $lecturers = User::where('role', 'Lecturer')->get();

        return view('courses.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses',
            'lecturer_id' => 'nullable|exists:users,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        $user = auth()->user();
        $isAssignedLecturer = $user->hasRole('Lecturer')
            && (int) $course->lecturer_id === (int) $user->getKey();

        if ($user->hasRole('Lecturer') && ! $isAssignedLecturer) {
            abort(403, 'You can only view rosters for your assigned courses.');
        }

        $canViewRoster = $user->hasRole('Administrator') || $isAssignedLecturer;

        $course->load('lecturer');

        if ($canViewRoster) {
            $course->load('students');
        }

        return view('courses.show', compact('course', 'canViewRoster'));
    }

    public function edit(Course $course)
    {
        $lecturers = User::where('role', 'Lecturer')->get();

        return view('courses.edit', compact('course', 'lecturers'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code,'.$course->id,
            'lecturer_id' => 'nullable|exists:users,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
