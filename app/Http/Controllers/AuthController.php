<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends \Illuminate\Routing\Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Lecturer / Administrator must be approved before entering dashboard
            if (in_array($user->role, ['Lecturer', 'Administrator']) && ! $user->is_approved) {
                return redirect()->route('pending.approval');
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Student,Lecturer,Administrator',
        ]);

        $isStudent = $data['role'] === 'Student';

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'is_approved' => $isStudent,
            'approved_at' => $isStudent ? now() : null,
        ]);

        // Assign Spatie role so role:Lecturer / role:Administrator middleware works
        $user->assignRole($data['role']);

        Auth::login($user);
        $request->session()->regenerate();

        // Students go straight to dashboard; Lecturer/Admin wait for approval
        if ($isStudent) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('pending.approval');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}