<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('approved'), // <-- Added so unapproved admins can't view this
            new Middleware('role:Administrator'),
        ];
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    // Show the list of pending users
    public function pending()
    {
        $users = User::whereIn('role', ['Lecturer', 'Administrator'])
            ->where('is_approved', false)
            ->latest()
            ->get();

        return view('users.pending', compact('users'));
    }

    // Approve the user
    public function approve(User $user)
    {
        $user->update([
            'is_approved' => true,
            'approved_at' => now(),
        ]);

        return back()->with('success', "{$user->name} has been approved!");
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:Administrator,Lecturer,Student',
        ]);

        $roleChanged = $user->role !== $request->role;
        $requiresApproval = in_array($request->role, ['Administrator', 'Lecturer']);
        $requiresNewApproval = $roleChanged && $requiresApproval;

        $user->update([
            'role' => $request->role,
            'is_approved' => $requiresNewApproval ? false : ($requiresApproval ? $user->is_approved : true),
            'approved_at' => $requiresNewApproval ? null : $user->approved_at,
        ]);
        $user->syncRoles($request->role);

        return back()->with('success', 'User role updated successfully.');
    }
}
