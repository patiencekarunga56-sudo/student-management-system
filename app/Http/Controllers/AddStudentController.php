<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddStudent;
use App\Models\AddCourse; // 👈 ADD THIS LINE
use App\Models\ContactRequest;

class AddStudentController extends Controller
{
    public function dashboards(Request $request)
    {
        $messages     = ContactRequest::latest()->get();
        $messageCount = ContactRequest::count();

        $query = AddStudent::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('reg_number', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->get();

        // 👈 ADD THIS LINE to fetch the courses
        $courses = AddCourse::latest()->get(); 

        return view('admin.dashboard', compact('messages', 'messageCount', 'students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_number'    => 'required|string|unique:students_registry,reg_number', // ✅ matches $table
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:students_registry,email',       // ✅ matches $table
            'program'       => 'required|string',
            'year_of_study' => 'required|string',
        ]);

        AddStudent::create($validated);

        return redirect()->back()->with('success', 'Student registered successfully!');
    }

    public function destroy($id)
    {
        $student = AddStudent::findOrFail($id);
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }
}