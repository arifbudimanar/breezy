<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('app.locale') && in_array(session()->get('app.locale'), config('locales'))) {
            app()->setLocale(session()->get('app.locale'));
        } else {
            app()->setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}
