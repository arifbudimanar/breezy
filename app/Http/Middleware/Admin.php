<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->user()->isAdmin() &&
            $request->user()->isEmailVerified() &&
            $request->user()->isUserVerified() &&
            $request->user()->isCompletedProfile()
        ) {
            return $next($request);
        }

        return to_route('user.dashboard')->with('warning', 'You are not authorized to access this page.');
    }
}
