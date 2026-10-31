<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registration');
        $user = Auth::user();

        if ($user->hasRole('Administrator')) {
            $registrations = Student::with('courses')->get();
            return view('registrations.index', compact('registrations'));
        } 
        
        if ($user->hasRole('Student')) {
            // Prevent accessing other users' records (1 mark)
            $student = $user->student;
            $courses = $student ? $student->courses : collect();
            $availableCourses = Course::all();
            return view('registrations.student', compact('courses', 'availableCourses'));
        }

        if ($user->hasRole('Lecturer')) {
            $assignedCourses = Course::where('lecturer_id', $user->id)->with('students.user')->get();
            return view('registrations.lecturer', compact('assignedCourses'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Auth::user()->student;

        if (!$student) {
            return back()->with('error', 'Student profile not found.');
        }

        // Prevent Duplicate Registrations (Question 4c)
        if ($student->courses()->where('course_id', $request->course_id)->exists()) {
            return back()->with('error', 'You are already registered for this course.');
        }

        $student->courses()->attach($request->course_id);

        return back()->with('success', 'Course registered successfully!');
    }

    

    
    public function show(string $id)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
