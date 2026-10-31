<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function student()
    {
        $students = student::all();
         return view('student', compact('students'));
    }
public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student');
    }
     
    public function logout()
    {
        return view('logout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'name'                => 'required|string|max:255',
        'email'               => 'required|email|unique:users,email',
        'student_number'      => 'required|string|unique:students,student_number',
        'registration_number' => 'required|string|unique:students,registration_number',
    ]);

    // Create User Account
    $user = User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'password' => bcrypt('Password123'),
    ]);
    $user->assignRole('Student');

    // Create Student Record
    Student::create([
        'user_id'             => $user->id,
        'student_number'      => $validated['student_number'],
        'registration_number' => $validated['registration_number'],
    ]);

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}
    

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()->back();
    }
}
