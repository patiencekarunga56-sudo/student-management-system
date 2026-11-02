<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class LecturerController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('role:Lecturer'),
        ];
    }

    public function index()
    {
        $courses = Course::where('lecturer_id', Auth::id())->with('students')->get();
        return view('lecturer.dashboard', compact('courses'));
    }
}