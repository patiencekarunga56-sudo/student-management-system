<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RegistrationController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        $registrations = Registration::where('user_id', Auth::id())->with('course')->get();
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $registeredCourseIds = Registration::where('user_id', Auth::id())->pluck('course_id');
        $courses = Course::whereNotIn('id', $registeredCourseIds)->get();
        return view('registrations.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id'
        ]);

        $exists = Registration::where('user_id', Auth::id())
                              ->where('course_id', $request->course_id)
                              ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for this course.');
        }

        Registration::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Successfully registered!');
    }

    public function destroy(Registration $registration)
    {
        if ($registration->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $registration->delete();
        return back()->with('success', 'Registration removed.');
    }
}