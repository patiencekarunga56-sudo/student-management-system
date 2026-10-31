<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
Route::get('/', [StudentController::class, 'index'])->name('index');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/store', [HomeController::class,'store'])->name('contact.store');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/store', [HomeController::class, 'store'])->name('register.store');
Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
Route::get('/forgot-password', [HomeController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/reset-password', [HomeController::class, 'resetPassword'])->name('reset.password');
Route::get('/student', [StudentController::class, 'student'])->name('student');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/lecturers', [HomeController::class, 'lecturers'])->name('lecturers');
Route::get('/registrations', [HomeController::class, 'registrations'])->name('registrations');
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::middleware(['auth', 'role:Administrator'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::get('/staff/dashboard', [HomeController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::resource('courses', CourseController::class);
    Route::resource('registrations', RegistrationController::class);
});
