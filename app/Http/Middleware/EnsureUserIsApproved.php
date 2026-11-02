<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsApproved
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // If the user is a Lecturer or Administrator and is NOT approved, block them.
        if ($user && in_array($user->role, ['Lecturer', 'Administrator']) && ! $user->is_approved) {
            return redirect()->route('pending.approval');
        }

        return $next($request);
    }
}