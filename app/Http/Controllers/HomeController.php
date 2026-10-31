<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function submitRegistrationForm(Request $request)
    {
          // 1. Validate incoming form inputs
        $validated = $request->validate([
            'name'                => 'required|string|max:255',
            'email'               => 'required|email|unique:users,email',
            'role'            => 'required|string|min:8|max:255',
            'password'      => 'required|string|unique:student,password',
            'confirm_password' => 'required|string|unique:student,password_confirmation',
        ]);

        // 2. Create the Student account
        $student = Student::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // 3. Assign default Student role (Spatie)
        $student->assignRole('Student');

        // 4. Create associated Student profile
        Student::create([
            'user_id'             => $student->id,
            'student_number'      => $validated['student_number'],
            'registration_number' => $validated['registration_number'],
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
    }
    
    public function index()
    {
    }

    public function contact()
    {
        return view('contact');
    }
       public function login()
    {
        return view('login');
    }
  public function register()
    {
        return view('register');
    
    }
     public function dashboard()
    {
    
    
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->role = $request->input('role');
        $student->password = Hash::make($request->input('password'));
        $student->save();

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
