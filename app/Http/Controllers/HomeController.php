<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddCourse; // 👈 Added this import

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        // 👈 Fetch the courses from the database
        $courses = AddCourse::latest()->get();

        // 👈 Pass $courses to the student view
        return view('student.dashboard', compact('courses'));
    }

    public function dashboards()
    {
        $messages = \App\Models\ContactRequest::latest()->get();
        $messageCount = \App\Models\ContactRequest::count();

        return view('admin.dashboard', compact('messages', 'messageCount')); 
    }
}