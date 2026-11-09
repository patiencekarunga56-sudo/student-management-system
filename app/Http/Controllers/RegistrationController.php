<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $canManageRegistrations = Auth::user()->can('manage registrations');

        $registrations = $canManageRegistrations
            ? Registration::with(['user', 'course'])->latest()->get()
            : Auth::user()->registrations()->with('course')->latest()->get();

        return view('registrations.index', compact('registrations', 'canManageRegistrations'));
    }

    public function create()
    {
        $canManageRegistrations = Auth::user()->can('manage registrations');
        $registeredCourseIds = $canManageRegistrations
            ? collect()
            : Auth::user()->registrations()->pluck('course_id');
        $courses = Course::whereNotIn('id', $registeredCourseIds)->orderBy('name')->get();
        $students = $canManageRegistrations
            ? User::where('role', 'Student')->orderBy('name')->get()
            : collect();

        return view('registrations.create', compact('courses', 'students', 'canManageRegistrations'));
    }

    public function store(Request $request)
    {
        $canManageRegistrations = Auth::user()->can('manage registrations');
        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'user_id' => $canManageRegistrations
                ? ['required', Rule::exists('users', 'id')->where('role', 'Student')]
                : ['prohibited'],
        ]);

        $userId = $canManageRegistrations ? (int) $validated['user_id'] : Auth::id();

        $exists = Registration::where('user_id', $userId)
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return back()->withInput()->with('error', 'This student is already registered for that course.');
        }

        Registration::firstOrCreate([
            'user_id' => $userId,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Course registration saved successfully.');
    }

    public function destroy(Registration $registration)
    {
        if ($registration->user_id !== Auth::id() && ! Auth::user()->can('manage registrations')) {
            abort(403, 'Unauthorized action.');
        }

        $registration->delete();

        return back()->with('success', 'Registration removed.');
    }
}
