<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'Administrator') {
            return view('dashboard.admin');
        } elseif ($user->role === 'Lecturer') {
            return redirect()->route('lecturer.dashboard');
        }

        return view('dashboard.student');
    }
}