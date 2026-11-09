<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// General routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'approved']);

// Pending Approval Route
Route::get('/pending-approval', function () {
    return view('auth.pending-approval');
})->name('pending.approval')->middleware('auth');

// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index')->middleware(['auth', 'approved', 'permission:view courses']);
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show')->middleware(['auth', 'approved', 'permission:view courses'])->whereNumber('course');

// Registrations
Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index')->middleware(['auth', 'approved', 'permission:view own registrations|manage registrations']);
Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create')->middleware(['auth', 'approved', 'permission:register courses|manage registrations']);
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store')->middleware(['auth', 'approved', 'permission:register courses|manage registrations']);
Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy')->middleware(['auth', 'approved', 'permission:register courses|manage registrations']);

// Lecturer (Added 'approved' middleware)
Route::get('/lecturer/dashboard', [LecturerController::class, 'index'])->name('lecturer.dashboard')->middleware(['auth', 'approved', 'permission:view assigned courses']);

// Admin - Students (Added 'approved' middleware)
Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware(['auth', 'approved', 'permission:manage students']);
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create')->middleware(['auth', 'approved', 'permission:manage students']);
Route::post('/students', [StudentController::class, 'store'])->name('students.store')->middleware(['auth', 'approved', 'permission:manage students']);
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit')->middleware(['auth', 'approved', 'permission:manage students']);
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update')->middleware(['auth', 'approved', 'permission:manage students']);
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy')->middleware(['auth', 'approved', 'permission:manage students']);

// Admin - Courses (Added 'approveddd  middleware)
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware(['auth', 'approved', 'permission:manage courses']);
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store')->middleware(['auth', 'approved', 'permission:manage courses']);
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit')->middleware(['auth', 'approved', 'permission:manage courses']);
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update')->middleware(['auth', 'approved', 'permission:manage courses']);
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware(['auth', 'approved', 'permission:manage courses']);

// Admin - Users (Added 'approved' middleware + Pending/Approve routes)
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware(['auth', 'approved', 'permission:manage users']);
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware(['auth', 'approved', 'permission:manage users']);

// Admin - Pending Users (New routes for approving accounts)
Route::get('/pending-users', [UserController::class, 'pending'])->name('users.pending')->middleware(['auth', 'approved', 'permission:manage users']);
Route::post('/pending-users/{user}/approve', [UserController::class, 'approve'])->name('users.approve')->middleware(['auth', 'approved', 'permission:manage users']);
