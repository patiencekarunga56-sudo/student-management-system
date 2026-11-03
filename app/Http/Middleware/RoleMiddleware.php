<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // If the user is not logged in OR their role doesn't match
        if (! $request->user() || $request->user()->role !== $role) {
            abort(403, 'Unauthorized access. You do not have the correct role.');
        }

        return $next($request);
    }
}