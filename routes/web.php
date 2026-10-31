<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddStudentController;
use App\Http\Controllers\AddCourseController; // 👈 Moved to the top

// Home
Route::get('/', [HomeController::class, 'index'])->name('index');

// Contact Form
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Old Messages
Route::get('/admin/screens/messages', function () {
    $messages = \App\Models\ContactRequest::latest()->get();
    return view('messages', ['messages' => $messages]);
});

// Student CRUD
Route::post('/admin/students', [AddStudentController::class, 'store'])->name('students.store');
Route::delete('/admin/students/{id}', [AddStudentController::class, 'destroy'])->name('students.destroy');

// Auth & Dashboards
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/student/dashboard', [HomeController::class, 'dashboard'])->name('student.dashboard');
Route::get('/admin/dashboard', [AddStudentController::class, 'dashboards'])->name('admin.dashboard');

// Course CRUD (Cleaned up and duplicates removed)
Route::post('/admin/courses', [AddCourseController::class, 'store'])->name('courses.store');
Route::put('/admin/courses/{id}', [AddCourseController::class, 'update'])->name('courses.update');
Route::delete('/admin/courses/{id}', [AddCourseController::class, 'destroy'])->name('courses.destroy');